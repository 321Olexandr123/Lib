<?php


namespace ExchangeBundle\Utils;


interface ExtendExchange extends ExchangeObjectInterface
{
    /**
     * @return PaymentSystemInterface
     */
    public function getPayment(): PaymentSystemInterface;
}