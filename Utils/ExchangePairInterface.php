<?php


namespace ExchangeBundle\Utils;


interface ExchangePairInterface extends \JsonSerializable
{
    /**
     * @param ExtendExchange $exchangeObject
     */
    public function setIn(ExtendExchange $exchangeObject): void;

    /**
     * @param ExtendExchange $exchangeObject
     */
    public function setOut(ExtendExchange $exchangeObject): void;

    /**
     * @return ExtendExchange
     */
    public function getIn(): ExtendExchange;

    /**
     * @return ExtendExchange
     */
    public function getOut(): ExtendExchange;

    /**
     * @return float
     */
    public function getCourse(): float;
}