<?php 
function wpdocs_codex_cvtemplate_init() {
    $labels = array(
        'name'                  => _x( 'cvtemplate', 'Post type general name', 'chomdu' ),
        'singular_name'         => _x( 'i', 'Post type singular name', 'chomdu' ),
        'menu_name'             => _x( 'cvtemplate', 'Admin Menu text', 'chomdu' ),
        'name_admin_bar'        => _x( 'cvtemplate', 'Add New on Toolbar', 'chomdu' ),
        'add_new'               => __( 'Add New', 'chomdu' ),
        'add_new_item'          => __( 'Add New cvtemplate', 'chomdu' ),
        'new_item'              => __( 'New cvtemplate', 'chomdu' ),
        'edit_item'             => __( 'Edit cvtemplate', 'chomdu' ),
        'view_item'             => __( 'View cvtemplate', 'chomdu' ),
        'all_items'             => __( 'All cvtemplates', 'chomdu' ),
        'search_items'          => __( 'Search cvtemplates', 'chomdu' ),
        'parent_item_colon'     => __( 'Parent cvtemplates:', 'chomdu' ),
        'not_found'             => __( 'No cvtemplates found.', 'chomdu' ),
        'not_found_in_trash'    => __( 'No cvtemplates found in Trash.', 'chomdu' ),
        'featured_cvtemplate'        => _x( 'cvtemplate Cover cvtemplate', 'Overrides the “Featured cvtemplate” phrase for this post type. Added in 4.3', 'chomdu' ),
        'set_featured_cvtemplate'    => _x( 'Set cover cvtemplate', 'Overrides the “Set featured cvtemplate” phrase for this post type. Added in 4.3', 'chomdu' ),
        'remove_featured_cvtemplate' => _x( 'Remove cover cvtemplate', 'Overrides the “Remove featured cvtemplate” phrase for this post type. Added in 4.3', 'chomdu' ),
        'use_featured_cvtemplate'    => _x( 'Use as cover cvtemplate', 'Overrides the “Use as featured cvtemplate” phrase for this post type. Added in 4.3', 'chomdu' ),
        'archives'              => _x( 'cvtemplate archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'chomdu' ),
        'insert_into_item'      => _x( 'Insert into cvtemplate', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'chomdu' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this cvtemplate', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'chomdu' ),
        'filter_items_list'     => _x( 'Filter cvtemplates list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'chomdu' ),
        'items_list_navigation' => _x( 'cvtemplates list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'chomdu' ),
        'items_list'            => _x( 'cvtemplates list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'chomdu' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'cvtemplate' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 41,
        'menu_icon'          => 'dashicons-admin-users',
        'supports'           => array( 'title','thumbnail','editor','page-attributes','excerpt'),
    );
 
    register_post_type( 'cvtemplate', $args );
}
 
add_action( 'init', 'wpdocs_codex_cvtemplate_init' );