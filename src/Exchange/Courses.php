<?php


namespace Exchange;


use Exchange\State\State;

abstract class Courses
{
    /** @var State */
    private $state;

    public function setState(State $state)
    {
        $this->state = $state;
    }

    public function getState(): State
    {
        return $this->state;
    }
}