<?php


namespace ExchangeBundle\Utils;


interface PaymentSystemInterface extends \Serializable
{
    /**
     * @return string
     */
    public function getSignature(): ?string;

    /**
     * @return string
     */
    public function getName(): ?string;

    /**
     * @return float
     */
    public function getPercent(): float;

    /**
     * @return float
     */
    public function getConstant(): float;
}