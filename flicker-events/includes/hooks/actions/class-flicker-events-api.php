<?php
/**
 * The action that registers the api route/routes.
 */
class flickerEventsApi extends flickerAction
{
    public function __construct()
    {
        parent::__construct('rest_api_init', 10);
    }
    /**
     * run the main function that runs when the hook is called
     * @return void
     */
    public function run()
    {
        register_rest_route(
            'flickerEvents/v1/',
            '/getAllEvents',
            array(
                'methods'  => 'GET',
                'callback' => array($this, 'getAllEvents'),
            )
        );
    }
    /**
     * getAllEvents the controller for the getAllEvents route, which returns all the events and their meta.
     * @param  object $request the request.
     * @return object the response.
     */
    public function getAllEvents(WP_REST_Request $request)
    {
        // arguments to query for.
        $args = [
            'post_type' => 'flicker_events',
        ];
        // all the events.
        $posts = get_posts($args);

        // add the events featured images and post meta data.
        foreach ($posts as $key => $post) {
            $posts[$key]->post_image = (wp_get_attachment_url(get_post_thumbnail_id($post->ID)) !== false ? wp_get_attachment_url(get_post_thumbnail_id($post->ID)) : null);
            $posts[$key]->post_meta  = [
                'date'     => get_post_meta($post->ID, 'flicker_event_date', true),
                'price'    => get_post_meta($post->ID, 'flicker_event_price', true),
                'quantity' => get_post_meta($post->ID, 'flicker_event_quantity', true),
            ];
        }

        return new WP_REST_Response($posts, 200);
    }
}

new flickerEventsApi();
