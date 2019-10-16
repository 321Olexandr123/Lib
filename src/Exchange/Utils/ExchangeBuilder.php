<?php
namespace Exchange\Utils;

use Exchange\Courses;

interface ExchangeBuilder
{
    public function in(ExchangeObjectInterface $exchangeObject);

    public function out(ExchangeObjectInterface $exchangeObject);

    public function context(Courses $courses);

    public function payment(PaymentSystem $paymentSystem);

    public function getResult(): array;

}