<?php
/**
 * Meta Box action, creates the meta box on the admin side.
 */
class flickerEventsMetabox extends flickerAction
{
    public function __construct()
    {
        parent::__construct('add_meta_boxes_flicker_events', 10);
    }
    /**
     * run the main function that runs when the hook is called.
     * @return void
     */
    public function run()
    {
        // add the metabox.
        add_meta_box('flicker_event_extras', 'Event Details', array($this, 'outputContent'), 'flicker_events', 'normal', 'low');
    }
    /**
     * outputContent output the form for the metabox
     * @param  object $post the post object for the current post.
     * @return void
     */
    public function outputContent($post)
    {
        ?>

        <div class="flicker-event-extras">
            <div>
                <label><strong>Event Date</strong></label>
                <br>
                <p>
                   <input type="date" name="flicker_event_date" value="<?php echo get_post_meta($post->ID, 'flicker_event_date', true); ?>">
                </p>
            </div>
            <div>
                <label><strong>Event Price</strong></label>
                <br>
                <p>
                    <input type="number" name="flicker_event_price" min="1" step="0.01" value="<?php echo get_post_meta($post->ID, 'flicker_event_price', true); ?>">
                </p>
            </div>
            <div>
                <label><strong>Ticket Quantity</strong></label>
                <br>
                <p>
                    <input type="number" name="flicker_event_quantity" min="0" step="1" value="<?php echo get_post_meta($post->ID, 'flicker_event_quantity', true); ?>">
                </p>

            </div>
        </div>

        <?php
}
}

new flickerEventsMetabox();
