<?php


namespace Exchange\State;


use Exchange\Courses;
use Exchange\Utils\ExchangeObjectInterface;

abstract class State
{
    /**
     * @param ExchangeObjectInterface|null $in
     * @param ExchangeObjectInterface|null $out
     * @param $multiplicity
     * @return mixed
     */
    abstract public function handle(ExchangeObjectInterface $in = null, ExchangeObjectInterface $out = null, $multiplicity = 1);

}