<?php

if (!function_exists('myblock_render_callback')){
    phpinfo();
    function myblock_render_callback($attributes)
    {
        $selected_category = $attributes['selectedCategory'] ?? 'all';

        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 5,
        );

        if ($selected_category !== 'all') {
            $args['category_name'] = $selected_category;
        }

        $query = new WP_Query($args);

        ob_start();

        if ($query->have_posts()) {
            echo '<div class="swiper myblock-slider"><div class="swiper-wrapper">';
            while ($query->have_posts()) {
                $query->the_post();
                echo '<div class="swiper-slide">';
                if (has_post_thumbnail()) {
                    echo get_the_post_thumbnail(get_the_ID(), 'medium', ['class' => 'post-thumbnail']);
                }
                echo '<h3>' . esc_html(get_the_title()) . '</h3>';
                echo '<p>' . esc_html(get_the_excerpt()) . '</p>';
                echo '</div>';
            }
            echo '</div></div>';
            wp_reset_postdata();
        } else {
            echo '<p>Посты не найдены.</p>';
        }

        return ob_get_clean();
    }
}