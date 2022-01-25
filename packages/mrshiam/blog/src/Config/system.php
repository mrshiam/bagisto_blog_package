<?php

return [
    [
        'key' => 'blog',
        'name' => 'Blog',
        'sort' => 1
    ], [
        'key' => 'blog.settings',
        'name' => 'Custom Settings',
        'sort' => 1,
    ], [
        'key' => 'blog.settings.settings',
        'name' => 'Custom Groupings',
        'sort' => 1,
        'fields' => [
            [
                'name' => 'status',
                'title' => 'Status',
                'type' => 'boolean',
                'channel_based' => true,
                'locale_based' => false
            ]
        ]
    ]
];
