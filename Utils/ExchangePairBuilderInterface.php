<?php

namespace ExchangeBundle\Utils;


interface ExchangePairBuilderInterface
{
    /**
     * @param ExchangeObjectInterface $exchangeObject
     * @return mixed
     */
    public function in(ExchangeObjectInterface $exchangeObject);

    /**
     * @param ExchangeObjectInterface $exchangeObject
     * @return mixed
     */
    public function out(ExchangeObjectInterface $exchangeObject);

    /**
     * @param PaymentSystemInterface $paymentSystem
     * @return mixed
     */
    public function payment(PaymentSystemInterface $paymentSystem);

    /**
     * @return \stdClass
     */
    public function getQuery(): \stdClass;

}