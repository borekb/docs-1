<?php

return [
    'baseUrl' => '',
    'production' => false,
    'collections' => [],
    'docSearchVersion' => 'v1',
    'config' => json_decode(file_get_contents(__DIR__ . '/tailwind.json'), true),
    'version' => json_decode(file_get_contents(__DIR__ . '/node_modules/tailwindcss/package.json'), true)['version'],
    'colors' => ['red', 'orange', 'yellow', 'green', 'teal', 'blue', 'indigo', 'purple', 'pink'],
    'active' => function ($page, $path) {
        $pages = collect(array_wrap($page));

        return $pages->contains(function ($page) use ($path) {
            return $page->getPath() === $path;
        });
    },
    'anyChildrenActive' => function ($page, $children) {
        return $children->contains(function ($link) use ($page) {
            return $page->getPath() == '/docs/'. $link;
        });
    },
    'navigation' => require_once('navigation.php'),
];
