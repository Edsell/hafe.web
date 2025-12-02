<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AutoTranslator
{
    protected string $sourceLang;
    protected string $targetLang;
    protected string $apiKey;

    public function __construct()
    {
        $this->sourceLang = config('app.translation_source_lang', env('TRANSLATION_SOURCE_LANG', 'en'));
        $this->targetLang = config('app.translation_target_lang', env('TRANSLATION_TARGET_LANG', 'sw'));
        $this->apiKey     = env('GOOGLE_TRANSLATE_API_KEY');
    }

    public function translateBatch(array $texts, ?string $targetLang = null): array
    {
        $targetLang = $targetLang ?: $this->targetLang;
        $result = [];

        // 1. Check cache first
        $toTranslate = [];
        foreach ($texts as $key => $text) {
            $hash = $this->makeHash($text, $this->sourceLang, $targetLang);

            $cached = DB::table('translation_cache')
                ->where('hash', $hash)
                ->first();

            if ($cached) {
                $result[$key] = $cached->translated_text;
            } else {
                $toTranslate[$key] = [
                    'text' => $text,
                    'hash' => $hash,
                ];
            }
        }

        if (empty($toTranslate)) {
            return $result;
        }

        // 2. Call Google Translate API for remaining texts
        $apiResponse = Http::post(
            'https://translation.googleapis.com/language/translate/v2?key=' . $this->apiKey,
            [
                'q'      => array_column($toTranslate, 'text'),
                'source' => $this->sourceLang,
                'target' => $targetLang,
                'format' => 'text',
            ]
        );

        if (! $apiResponse->successful()) {
            // On error, just return original text for safety
            foreach ($toTranslate as $key => $data) {
                $result[$key] = $data['text'];
            }
            return $result;
        }

        $translations = $apiResponse->json('data.translations', []);

        // 3. Map responses back and store in cache
        $index = 0;
        foreach ($toTranslate as $key => $data) {
            $translatedText = $translations[$index]['translatedText'] ?? $data['text'];
            $index++;

            $result[$key] = $translatedText;

            DB::table('translation_cache')->insert([
                'hash'            => $data['hash'],
                'source_text'     => $data['text'],
                'source_lang'     => $this->sourceLang,
                'target_lang'     => $targetLang,
                'translated_text' => $translatedText,
                'created_at'      => now(),
                'updated_at'      => now(),
            ]);
        }

        return $result;
    }

    protected function makeHash(string $text, string $sourceLang, string $targetLang): string
    {
        return hash('sha256', $sourceLang . '|' . $targetLang . '|' . $text);
    }
}
