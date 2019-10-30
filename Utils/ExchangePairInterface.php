<?php


namespace ExchangeBundle\Utils;


interface ExchangePairInterface extends \JsonSerializable
{
    /**
     * @param ExchangeObjectInterface $exchangeObject
     */
    public function setIn(ExchangeObjectInterface $exchangeObject): void;

    /**
     * @param ExchangeObjectInterface $exchangeObject
     */
    public function setOut(ExchangeObjectInterface $exchangeObject): void;

    /**
     * @param float $course
     */
    public function setCourse(float $course): void;

    /**
     * @return ExchangeObjectInterface
     */
    public function getIn(): ExchangeObjectInterface;

    /**
     * @return ExchangeObjectInterface
     */
    public function getOut(): ExchangeObjectInterface;

    /**
     * @return float
     */
    public function getCourse(): float;
}