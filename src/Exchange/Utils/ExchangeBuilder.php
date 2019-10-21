<?php

namespace Exchange\Utils;


interface ExchangeBuilder
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
     * @param ExchangeObjectInterface $in
     * @param ExchangeObjectInterface $out
     * @return mixed
     */
    public function course(ExchangeObjectInterface $in, ExchangeObjectInterface $out);

    /**
     * @return \stdClass
     */
    public function getQuery(): \stdClass;

}