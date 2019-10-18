<?php
namespace Exchange\Utils;

use Exchange\Courses;

interface ExchangeBuilder extends \JsonSerializable
{
    public function in(ExchangeObjectInterface $exchangeObject);

    public function out(ExchangeObjectInterface $exchangeObject);

    public function courses(Courses $courses);

    public function payment(PaymentSystemInterface $paymentSystem);

    public function getResult();

}