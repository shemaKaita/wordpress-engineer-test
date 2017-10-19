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
        // register the field for the meta.
        register_rest_field(
            'flicker_events',
            'flicker_event_meta',
            array(
                'get_callback' => array($this, 'getEventMeta'),
                'schema'       => null,
            )
        );
    }
    /**
     * getEventMeta get the meta for the requested event.
     * @param  array $object the data for the requested event.
     * @return array         an array with the meta for the event.
     */
    public function getEventMeta($object)
    {
        // the post id.
        $id = $object['id'];
        // the data.
        $meta = [
            'date'     => get_post_meta($id, 'flicker_event_date', true),
            'price'    => get_post_meta($id, 'flicker_event_price', true),
            'quantity' => get_post_meta($id, 'flicker_event_quantity', true),
        ];
        return $meta;
    }
}

new flickerEventsApi();
