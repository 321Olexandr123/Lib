<?php


namespace ExchangeBundle\ExchangeBundle;
use ExchangeBundle\Utils\ExchangePairInterface;

abstract class AbstractPairCreator
{
    abstract static function create(ExchangePairInterface $pair, \stdClass $data): ExchangePairInterface;
}