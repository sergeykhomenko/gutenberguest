<?php

namespace Gutenberguest;

use Basics\Singleton;
use Gutenberguest\Guten\Guten;

class Theme extends Singleton
{

    /** @var Guten Gutenberg Adapter */
    public $gutenberg;

    public function __construct() {

        $this->gutenberg = Guten::getInstance();
        add_action('init', [$this->gutenberg, 'initBlocks']);

        add_action('init', [$this, 'init']);

    }

    public function init()
    {
    }

}