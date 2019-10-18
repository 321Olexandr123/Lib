<?php


namespace Exchange;


use Exchange\State\State;
use ReflectionClass;

class Courses implements \Iterator
{
    public $stateList = [];
    private $position = -1;

    public function __construct()
    {
        $this->position = -1;
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
        $this->position = -1;
    }

    public function current()
    {
        return $this->stateList[$this->position];
    }

    public function next()
    {
        ++$this->position;
    }

    public function key()
    {
        try {
            $this->next();
            return (new ReflectionClass($this->current()))->getShortName();
        } catch (\ReflectionException $e) {
        }
    }

    /**
     * Checks if current position is valid
     * @link https://php.net/manual/en/iterator.valid.php
     * @return void The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        // TODO: Implement valid() method.
    }
}