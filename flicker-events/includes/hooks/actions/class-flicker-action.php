<?php
/**
 * All actions extend this class and get passed on to the flickerEventsHooks class to store.
 */
class flickerAction
{
    /**
     * $hook the name of the action to run.
     * @var string
     */
    public $hook;
    /**
     * $priority the level of priority this action should hold.
     * @var int
     */
    public $priority;
    public function __construct($hook = '', $priority = 10)
    {
        // set the properties for the class.
        $this->hook     = $hook;
        $this->priority = $priority;
        // add the current action to the store of hooks.
        $flickerHooks = new flickerEventsHooks();
        $flickerHooks->add($this, 'action');
    }
    /**
     * run the main function that runs when the hook is called
     * @return void
     */
    public function run()
    {
        return;
    }

}
