<?php
namespace Exchange\Utils;

use Exchange\Courses;

interface ExchangeBuilder extends \JsonSerializable
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
     * @param array $courses
     * @return mixed
     */
    public function courses(array $courses);

    /**
     * @param PaymentSystemInterface $paymentSystem
     * @return mixed
     */
    public function payment(PaymentSystemInterface $paymentSystem);

    /**
     * @return mixed
     */
    public function getResult();

}