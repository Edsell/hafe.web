<?php

if (!function_exists('seoMeta')) {
    function seoMeta($title, $description = '', $image = '', $url = '')
    {
        $defaultImage = asset('uploads/logo.png');
        $meta = [
            'title' => $title,
            'description' => strip_tags(Str::limit($description, 160)),
            'image' => $image ?: $defaultImage,
            'url' => $url ?: url()->current(),
        ];

        return $meta;
    }
}
