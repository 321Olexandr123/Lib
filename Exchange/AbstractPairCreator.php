<?php


namespace ExchangeBundle\Exchange;
use ExchangeBundle\Utils\ExchangePairInterface;

abstract class AbstractPairCreator
{
    abstract static function build(ExchangePairInterface $pair, \stdClass $data): ExchangePairInterface;
}