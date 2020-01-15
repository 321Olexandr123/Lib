<?php


namespace ExchangeBundle\Utils;


interface ExchangePairInterface extends \JsonSerializable
{
    public function setIn(ExtendExchange $extendExchange): void;

    public function setOut(ExtendExchange $extendExchange): void;

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