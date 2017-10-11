<?php
/**
 * The action that registers the post type.
 */
class flickerEventsPost extends flickerAction
{
    public function __construct()
    {
        parent::__construct('init', 0);
    }
    /**
     * run the main function that runs when the hook is called
     * @return void
     */
    public function run()
    {

        $labels = array(
            'name'                  => _x('flicker_events', 'Post Type General Name', 'flicker-events'),
            'singular_name'         => _x('flicker_event', 'Post Type Singular Name', 'flicker-events'),
            'menu_name'             => __('Flicker Events', 'flicker-events'),
            'name_admin_bar'        => __('Flicker Event', 'flicker-events'),
            'archives'              => __('Item Archives', 'flicker-events'),
            'attributes'            => __('Item Attributes', 'flicker-events'),
            'parent_item_colon'     => __('Parent Item:', 'flicker-events'),
            'all_items'             => __('All Events', 'flicker-events'),
            'add_new_item'          => __('Add New Event', 'flicker-events'),
            'add_new'               => __('Add New Event', 'flicker-events'),
            'new_item'              => __('New Event', 'flicker-events'),
            'edit_item'             => __('Edit Event', 'flicker-events'),
            'update_item'           => __('Update Item', 'flicker-events'),
            'view_item'             => __('View Event', 'flicker-events'),
            'view_items'            => __('View Events', 'flicker-events'),
            'search_items'          => __('Search Event', 'flicker-events'),
            'not_found'             => __('Not found', 'flicker-events'),
            'not_found_in_trash'    => __('Not found in Trash', 'flicker-events'),
            'featured_image'        => __('Featured Image', 'flicker-events'),
            'set_featured_image'    => __('Set featured image', 'flicker-events'),
            'remove_featured_image' => __('Remove featured image', 'flicker-events'),
            'use_featured_image'    => __('Use as featured image', 'flicker-events'),
            'insert_into_item'      => __('Insert into item', 'flicker-events'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'flicker-events'),
            'items_list'            => __('Items list', 'flicker-events'),
            'items_list_navigation' => __('Items list navigation', 'flicker-events'),
            'filter_items_list'     => __('Filter items list', 'flicker-events'),
        );
        $args = array(
            'label'               => __('Flicker event', 'flicker-events'),
            'description'         => __('Flicker events', 'flicker-events'),
            'labels'              => $labels,
            'supports'            => array('title', 'editor', 'thumbnail'),
            'taxonomies'          => array('category', 'post_tag'),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 5,
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
        );
        register_post_type('flicker_events', $args);

    }
}

new flickerEventsPost();
