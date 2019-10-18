<?php


namespace Exchange\Utils;


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
     * @param array $courses
     * @return mixed
     */
    public function setCourses(array $courses);

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
    public function getCourses(): array;

    /**
     * @return mixed
     */
    public function getPayment(): PaymentSystemInterface;
}