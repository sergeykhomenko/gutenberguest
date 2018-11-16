<?php

namespace Basics;

class GutenBlock
{

    private $block;

    public function __construct() {}

    public function loadFromOptions($options = [])
    {
        $this->block = $options['block'] ?? '';
    }

    public function isValid()
    {
        return true;
    }

    public function wpInit()
    {
        $blockUrlBase   = apply_filters('gutenblock_base', get_stylesheet_directory_uri() . '/blocks/');
        $blockHandle    = apply_filters('gutenblock_handle', 'gutenberguest-block-' . $this->block, $this->block);
        $blockName      = apply_filters('gutenblock_name', 'gutenberguest/' . $this->block);

        wp_register_script(
            $blockHandle,
            $blockUrlBase . $this->block . '/main.js',
            array( 'wp-blocks', 'wp-element' )
        );

        register_block_type( $blockName, array(
            'editor_script' => $blockHandle,
        ) );
    }

}