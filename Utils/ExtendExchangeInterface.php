<?php


namespace ExchangeBundle\Utils;


interface ExtendExchangeInterface
{
    /**
     * @return PaymentSystemInterface
     */
    public function getPaymentSystem(): PaymentSystemInterface;

    /**
     * @return ExchangeObjectInterface
     */
    public function getExchangeObject(): ExchangeObjectInterface;

    /**
     * @return string
     */
    public function getProvider(): string;

    /**
     * @return float
     */
    public function getPercentPurchase(): float;

    /**
     * @return float
     */
    public function getPercentSelling(): float;

    /**
     * @return float
     */
    public function getConstantPurchase(): float;

    /**
     * @return float
     */
    public function getConstantSelling(): float;
}