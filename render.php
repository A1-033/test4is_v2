<?php
/**
 * Рендеринг блока на фронтенде.
 *
 * @param array $attributes Атрибуты блока.
 */


<?php
function myblock_render_callback($attributes) {
    $cat = sanitize_text_field($attributes['category']);

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 5,
    );

    if ($cat !== 'all') {
        $args['category_name'] = $cat;
    }

    $query = new WP_Query($args);

    ob_start();
    echo '<div class="swiper">';
    echo '<div class="swiper-wrapper">';

    while ($query->have_posts()) {
        $query->the_post();
        echo '<div class="swiper-slide">';
        echo '<h4>' . get_the_title() . '</h4>';
        echo '</div>';
    }

    echo '</div></div>'; // .swiper-wrapper, .swiper
    wp_reset_postdata();
    return ob_get_clean();
}
