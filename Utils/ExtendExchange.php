<?php


namespace ExchangeBundle\Utils;


interface ExtendExchange
{
    /**
     * @return PaymentSystemInterface
     */
    public function getPayment(): PaymentSystemInterface;

    /**
     * @return ExchangeObjectInterface
     */
    public function getExchangeObject(): ExchangeObjectInterface;
}