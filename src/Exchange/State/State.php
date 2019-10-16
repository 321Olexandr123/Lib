<?php


namespace Exchange\State;


use Exchange\Courses;
use Exchange\Utils\ExchangeObjectInterface;

abstract class State
{
    /** @var Courses */
    protected $courses;

    /**
     * State constructor.
     * @param $courses
     */
    public function __construct(Courses $courses)
    {
        $this->courses = $courses;
    }

    /**
     * @param ExchangeObjectInterface|null $in
     * @param ExchangeObjectInterface|null $out
     * @param $multiplicity
     * @return mixed
     */
    abstract public function handle(ExchangeObjectInterface $in = null, ExchangeObjectInterface $out = null, $multiplicity = 1);

}