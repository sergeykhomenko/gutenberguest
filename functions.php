<?php

spl_autoload_register(function ($className) {
    $filename = dirname( __FILE__ ) . '/src/' . str_replace('\\', '/', $className) . '.php';
    if(file_exists($filename)) {
        require_once 'src/' . str_replace('\\', '/', $className) . '.php';
    }
});

use Gutenberguest\Theme;

/** @var Theme $core */
$core = Theme::getInstance();

$core->gutenberg->register([
    'block' => 'slider'
]);