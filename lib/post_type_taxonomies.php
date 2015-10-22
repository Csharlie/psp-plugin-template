<?php

// register taxonomiy to go with the post type
add_action( 'init', 'create_taxonomies', 0 );

function create_taxonomies() {
    // custom taxonomy
    $labels = array(
        'name'              => _x( 'Custom Taxonomies', 'taxonomy general name' ),
        'singular_name'     => _x( 'Custom Tax', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Custom Taxonomies' ),
        'all_items'         => __( 'All Custom Taxonomies' ),
        'parent_item'       => __( 'Parent Custom Tax' ),
        'parent_item_colon' => __( 'Parent Custom Tax:' ),
        'edit_item'         => __( 'Edit Custom Tax' ),
        'update_item'       => __( 'Update Custom Tax' ),
        'add_new_item'      => __( 'Add New Custom Tax' ),
        'new_item_name'     => __( 'New Custom Tax' ),
        'menu_name'         => __( 'Custom Taxonomies' ),
    );
    register_taxonomy(
        'tax',
        'post-type-template',
        array(
            'hierarchical' => true,
            'labels' => $labels,
            'query_var' => true,
            'rewrite' => true,
            'show_admin_column' => true
        )
    );
}
?>