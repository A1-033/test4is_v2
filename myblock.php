<?php
/**
 * Plugin Name: my Block
 * Description: Gutenberg block
 */

function myblock_init() {
    register_block_type( __DIR__ );
}
add_action( 'init', 'myblock_init' );

