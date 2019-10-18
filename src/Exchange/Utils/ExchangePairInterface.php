<?php


namespace Exchange\Utils;


use Exchange\Courses;

interface ExchangePairInterface extends \Serializable
{
    /**
     * @param ExchangeObjectInterface $exchangeObject
     * @return mixed
     */
    public function setIn(ExchangeObjectInterface $exchangeObject);

    /**
     * @param ExchangeObjectInterface $exchangeObject
     * @return mixed
     */
    public function setOut(ExchangeObjectInterface $exchangeObject);

    /**
     * @param PaymentSystemInterface $paymentSystem
     * @return mixed
     */
    public function setPayment(PaymentSystemInterface $paymentSystem);

    /**
     * @return mixed
     */
    public function getIn(): ExchangeObjectInterface;

    /**
     * @return mixed
     */
    public function getOut(): ExchangeObjectInterface;

    /**
     * @return mixed
     */
    public function getPayment(): PaymentSystemInterface;
}