<?php


namespace ExchangeBundle\Utils;


interface PaymentSystemInterface extends \Serializable
{
    /**
     * @return string
     */
    public function getSignature(): string;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return float
     */
    public function getMin(): float;

    /**
     * @return float
     */
    public function getMax(): float;

    /**
     * @return array
     */
    public function getConditional(): array;
}