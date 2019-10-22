<?php


namespace ExchangeBundle\Exchange;


use ExchangeBundle\Utils\CalculationInterface;
use ExchangeBundle\Utils\ExchangePairInterface;

abstract class AbstractCalculation implements CalculationInterface
{

    private $pair;

    /**
     * AbstractCalculation constructor.
     * @param ExchangePairInterface $exchangePair
     */
    public function __construct(ExchangePairInterface $exchangePair)
    {
        $this->pair = $exchangePair;
    }

    public function pair(): ExchangePairInterface
    {
        return $this->pair;
    }

    abstract public function onChangeIn(): float;

    abstract public function onChangeOut(): float;
}