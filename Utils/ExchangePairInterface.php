<?php


namespace ExchangeBundle\Utils;


interface ExchangePairInterface extends \JsonSerializable
{
    public function setIn(ExtendExchangeInterface $extendExchange): void;

    public function setOut(ExtendExchangeInterface $extendExchange): void;

    /**
     * @return ExtendExchangeInterface
     */
    public function getIn(): ExtendExchangeInterface;

    /**
     * @return ExtendExchangeInterface
     */
    public function getOut(): ExtendExchangeInterface;

    /**
     * @return float
     */
    public function getCourse(): float;
    /**
     * @return string
     */
    public function getType(): string;
}