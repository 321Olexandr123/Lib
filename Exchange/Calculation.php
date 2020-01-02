<?php


namespace ExchangeBundle\Exchange;


use ExchangeBundle\Utils\ExchangePairInterface;

interface Calculation
{
    /**
     * @param float $count
     * @param ExchangePairInterface $pair
     * @param array $params
     * @return float
     */
    public static function onChangeIn(float $count, ExchangePairInterface $pair, $params = []): float;

    /**
     * @param float $count
     * @param ExchangePairInterface $pair
     * @param array $params
     * @return float
     */
    public static function onChangeOut(float $count, ExchangePairInterface $pair, $params = []): float;
}