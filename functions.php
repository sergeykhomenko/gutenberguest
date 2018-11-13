<?php

spl_autoload_register(function ($className) {
    require_once 'src/' . $className . '.php';
});

use Gutenberguest\Theme;

/** @var Theme $core */
$core = Theme::getInstance();

$core->gutenberg->register([
    'block' => 'slider'
]);

add_action('init', [$core, 'init']);