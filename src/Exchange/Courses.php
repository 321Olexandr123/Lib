<?php


namespace Exchange;


use Exchange\State\State;
use ReflectionClass;

class Courses implements \Iterator
{
    const START = 0;

    public $stateList = [];
    private $position = self::START;

    public function __construct(array $states = [])
    {
        $this->position = self::START;
        $this->stateList = $states;
    }

    public function add(State $state): self
    {
        $this->stateList[] = $state;
        return $this;
    }

    public function rewind()
    {
        $this->position = self::START;
    }

    public function current()
    {
        return $this->stateList[$this->position];
    }

    public function next()
    {
        $this->position++;
    }

    public function key()
    {
        try {

            $tmp = (new ReflectionClass($this->current()))->getShortName();
            $this->next();
            return $tmp;
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