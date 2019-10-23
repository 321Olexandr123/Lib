<?php


namespace ExchangeBundle\Utils;


interface PaymentSystemInterface
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
     * @return float
     */
    public function getPercent(): float;

    /**
     * @return float
     */
    public function getConstant(): float;
}