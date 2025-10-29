<?php

use Illuminate\Support\Str;

if (!function_exists('seoMeta')) {
    function seoMeta(string $title, ?string $description = '', ?string $image = '', ?string $url = ''): array
    {
        $defaultImage = asset('uploads/logo.png');

        return [
            'title'       => $title ?: 'HAFE Pre & Primary School',
            'description' => Str::limit(strip_tags((string) $description), 160),
            'image'       => $image ?: $defaultImage,
            'url'         => $url ?: url()->current(),
        ];
    }
}
