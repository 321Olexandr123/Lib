<?php


namespace ExchangeBundle\Utils;


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
     * @param float $course
     * @return mixed
     */
    public function setCourse(float $course);

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

    /**
     * @return float
     */
    public function getCourse(): float;
}