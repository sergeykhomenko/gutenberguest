<?php

spl_autoload_register(function ($className) {
    require_once 'src/' . str_replace('\\', '/', $className) . '.php';
});

use Gutenberguest\Theme;

/** @var Theme $core */
$core = Theme::getInstance();

$core->gutenberg->register([
    'block' => 'slider'
]);

add_action('init', [$core, 'init']);