<?php
namespace Exchange\Utils;

use Exchange\Courses;

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
     * @param Courses $courses
     * @return mixed
     */
    public function courses(Courses $courses);

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