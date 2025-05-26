<?php
/**
 * Plugin Name: my Block
 * Description: Gutenberg block
 */

function block_init() {
    register_block_type_from_metadata(__DIR__);
}
add_action('init', 'block_init');


