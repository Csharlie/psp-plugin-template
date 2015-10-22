<?php

// create shortcode with parameters so that the user can define what's queried - default is to list all blog posts
add_shortcode( 'custom-posts', 'custom_post_shortcode' );

function custom_post_shortcode( $atts ) {

    ob_start();
 
    // define attributes and their defaults

    extract( shortcode_atts( array (
        'post_type' => 'post-type-template',
        'order' => 'date',
        'orderby' => 'title',
        'posts' => -1,
        'tax' => ''
    ), $atts ) );

    $query = new WP_Query( array(
        'post_type' => $post_type,
        'order' => $order,
        'orderby' => $orderby,
        'posts_per_page' => $posts,
        'tax' => $tax
    ));

    // run the loop based on the query
    if ( $query->have_posts() ) { ?>
        <ul class="custom-posts">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </ul>
    <?php
        $myvariable = ob_get_clean();
        return $myvariable;
    }
}
?>