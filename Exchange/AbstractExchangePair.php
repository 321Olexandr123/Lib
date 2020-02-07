<?php


namespace ExchangeBundle\Exchange;


use ExchangeBundle\Utils\ExchangePairInterface;
use ExchangeBundle\Utils\ExtendExchangeInterface;

/**
 * Class AbstractExchangePair
 * @package ExchangeBundle\Exchange
 */
abstract class AbstractExchangePair implements ExchangePairInterface
{

    abstract function setIn(ExtendExchangeInterface $extendExchange): void;

    abstract function setOut(ExtendExchangeInterface $extendExchange): void;

    /**
     * @return float
     */
    abstract function getCourse(): float;

    /**
     * @return ExtendExchangeInterface
     */
    abstract function getIn(): ExtendExchangeInterface;

    /**
     * @return ExtendExchangeInterface
     */
    abstract function getOut(): ExtendExchangeInterface;

    /**
     * @return string
     */
    abstract function getType(): string;

}