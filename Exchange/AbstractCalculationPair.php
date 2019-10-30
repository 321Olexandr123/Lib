<?php


namespace ExchangeBundle\Exchange;


use ExchangeBundle\Utils\ExchangePairInterface;

abstract class AbstractCalculationPair
{
    abstract static function changeIn(float $count, ExchangePairInterface $pair): float;

    abstract static function changeOut(float $count, ExchangePairInterface $pair): float;
}