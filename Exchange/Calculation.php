<?php


namespace ExchangeBundle\Exchange;


use ExchangeBundle\Utils\ExchangePairInterface;

interface Calculation
{
    /**
     * @param float $count
     * @param ExchangePairInterface $pair
     * @return float
     */
    public static function onChangeIn(float $count, ExchangePairInterface $pair): float;

    /**
     * @param float $count
     * @param ExchangePairInterface $pair
     * @return float
     */
    public static function onChangeOut(float $count, ExchangePairInterface $pair): float;
}