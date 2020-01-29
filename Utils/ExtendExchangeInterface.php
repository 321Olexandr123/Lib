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
     * @return PaymentSettingsInterface
     */
    public function getPaymentSettings(): PaymentSettingsInterface;
}