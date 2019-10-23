<?php


namespace ExchangeBundle\Exchange;


use ExchangeBundle\Utils\CalculationInterface;
use ExchangeBundle\Utils\ExchangePairInterface;

abstract class AbstractCalculation implements CalculationInterface
{
    private $pair;

    /**
     * AbstractCalculation constructor.
     * @param $pair
     */
    public function __construct(ExchangePairInterface $pair)
    {
        $this->pair = $pair;
    }

    abstract public function onChangeIn(): float;

    abstract public function onChangeOut(): float;
}