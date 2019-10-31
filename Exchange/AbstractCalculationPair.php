<?php


namespace ExchangeBundle\Exchange;


use ExchangeBundle\Utils\ExchangePairInterface;

abstract class AbstractCalculationPair
{
    abstract static function onChangeIn(float $count, ExchangePairInterface $pair): float;

    abstract static function onChangeOut(float $count, ExchangePairInterface $pair): float;
}