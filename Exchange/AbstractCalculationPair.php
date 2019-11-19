<?php


namespace ExchangeBundle\Exchange;


use ExchangeBundle\Utils\ExchangePairInterface;

abstract class AbstractCalculationPair
{
    /**
     * @param float $count
     * @param ExchangePairInterface $pair
     * @return float
     */
    abstract static function onChangeIn(float $count, ExchangePairInterface $pair): float;

    /**
     * @param float $count
     * @param ExchangePairInterface $pair
     * @return float
     */
    abstract static function onChangeOut(float $count, ExchangePairInterface $pair): float;
}