<?php
/**
 * Plugin Name: My Block
 * Description: Gutenberg block with dynamic render.
 */

add_action('init', "register_block");

function register_block() {
    register_block_type_from_metadata(__DIR__ . '/');
}