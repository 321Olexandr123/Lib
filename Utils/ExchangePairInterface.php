<?php


namespace ExchangeBundle\Utils;


interface ExchangePairInterface extends \JsonSerializable
{
    public function setIn(): void;

    public function setOut(): void;

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