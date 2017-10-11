<?php

class flickerEventsHooks
{
    private $actions = [];
    private $filters = [];
    protected static $instance;
    public function __construct()
    {
        if (!isset($this::$instance)) {
            $this::$instance = $this;
        }
    }
    public function add($args = [], $type = '')
    {
        switch ($type) {
            case 'action':
                $this::$instance->actions[] = $args;
                break;
            case 'filter':
                $this::$instance->filters[] = $args;
                break;
        }
    }
    public function registerHooks()
    {
        foreach ($this::$instance->actions as $key => $action) {
            add_action($action->hook, array($action, 'run'), $action->priority);
        }
        foreach ($this::$instance->filters as $key => $filter) {
            add_filter();
        }
    }

}
