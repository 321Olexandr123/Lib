<?php


namespace Exchange\Utils;


abstract class ExchangePair
{
    /**
     * @return mixed
     */
    abstract public function in(): ExchangeObjectInterface;

    /**
     * @return mixed
     */
    abstract public function out(): ExchangeObjectInterface;

    /**
     * @param array $courses
     * @return mixed
     */
    abstract public function courses(array $courses);

    /**
     * @param PaymentSystemInterface $paymentSystem
     * @return mixed
     */
    abstract public function payment(PaymentSystemInterface $paymentSystem);
}