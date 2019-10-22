<?php


namespace Exchange;

use Exchange\Utils\ExchangePairInterface;

abstract class AbstractPairCreator
{
    abstract static function build(ExchangePairInterface $pair, \stdClass $data): ExchangePairInterface;
}