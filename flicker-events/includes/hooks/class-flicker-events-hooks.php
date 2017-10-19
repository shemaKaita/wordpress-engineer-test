<?php
/**
 * Store of all hooks.
 */
class flickerEventsHooks
{
    /**
     * $actions all the actions.
     * @var array
     */
    private $actions = [];
    /**
     * $filters all the filters.
     * @var array
     */
    private $filters = [];
    /**
     * $instance static instance of the class.
     * @var object
     */
    protected static $instance;
    public function __construct()
    {
        // check if instance is set.
        if (!isset($this::$instance)) {
            $this::$instance = $this;
        }
    }
    /**
     * add an action to the store.
     * @param object $obj the object of the hook.
     * @param string $type the type of hook it is.
     */
    public function add($obj, $type = '')
    {
        switch ($type) {
            case 'action':
                $this::$instance->actions[] = $obj;
                break;
            case 'filter':
                $this::$instance->filters[] = $obj;
                break;
        }
    }
    /**
     * registerHooks run all the stored hooks.
     * @return void
     */
    public function registerHooks()
    {
        foreach ($this::$instance->actions as $key => $action) {
            add_action($action->hook, array($action, 'run'), $action->priority);
        }
        foreach ($this::$instance->filters as $key => $filter) {
            add_filter($filter->hook, array($filter, 'run'), $filter->priority, $filter->accepted_args);
        }
    }

}
