<?php

<?php
/**
 * Plugin Name: My Block
 * Description: Gutenberg block with PHP render
 * Author: I
 */

function myblock_register_block() {
    register_block_type_from_metadata(__DIR__);
}
add_action('init', 'myblock_register_block');
