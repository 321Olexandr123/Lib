<?php
namespace Exchange\Utils;

use Exchange\Courses;

interface ExchangeBuilder
{
    public function in(ExchangeObject $exchangeObject);

    public function out(ExchangeObject $exchangeObject);

    public function context(Courses $courses);

    public function payment(PaymentSystem $paymentSystem);

    public function getResult(): array;

}