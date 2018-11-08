<?php

spl_autoload_register(function ($className) {
    require_once 'src/' . $className . '.php';
});

use Gutenberguest\Theme;

$core = Theme::getInstance();
