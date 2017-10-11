<?php
/**
 * The action to run when an event gets updated or saved.
 */
class flickerEventsSaveMeta extends flickerAction
{
    public function __construct()
    {
        parent::__construct('save_post_flicker_events', 10);
    }
    /**
     * run the main function that runs when the hook is called
     * @return void
     */
    public function run()
    {
        // check if the meta is in the post array.
        if (isset($_POST['flicker_event_price']) && isset($_POST['flicker_event_quantity']) && isset($_POST['flicker_event_date'])) {
            // update the postmeta with the sanitized values.
            $id       = intval(sanitize_text_field($_POST['post_ID']));
            $date     = sanitize_text_field($_POST['flicker_event_date']);
            $price    = floatval(sanitize_text_field($_POST['flicker_event_price']));
            $quantity = intval(sanitize_text_field($_POST['flicker_event_quantity']));

            update_post_meta($id, 'flicker_event_date', $date);
            update_post_meta($id, 'flicker_event_price', $price);
            update_post_meta($id, 'flicker_event_quantity', $quantity);
        }
    }
}
new flickerEventsSaveMeta();
