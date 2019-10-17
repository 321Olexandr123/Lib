<?php


namespace Exchange;


use Exchange\State\State;

abstract class Courses implements \Iterator
{
    private $stateList = [];
    private $position = 0;

    public function __construct() {
        $this->position = 0;
    }

    public function add(State $state): self
    {
        $this->stateList[] = $state;
        return $this;
    }

    public function create(array $states = []): self
    {
        $this->stateList = $states;
        return $this;
    }

    public function rewind()
    {
        reset($this->stateList);
    }

    public function current()
    {
        return current($this->stateList);
    }

    public function key()
    {
        return get_class($this->current());
    }
    public function next()
    {
        return next($this->stateList);
    }
}