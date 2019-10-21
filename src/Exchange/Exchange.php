<?php

namespace Exchange;

use Exchange\State\Currency\Course;
use Exchange\State\Currency\Purchase;
use Exchange\State\Currency\Selling;
use Exchange\State\State;
use Exchange\Utils\ExchangeBuilder;

use Exchange\Utils\ExchangeObjectInterface;
use Exchange\Utils\PaymentSystemInterface;

class Exchange implements ExchangeBuilder
{
    protected $query;

    protected function reset(): void
    {
        $this->query = new \stdClass;
    }

    public function in(ExchangeObjectInterface $exchangeObject)
    {
        $this->reset();
        $this->query->in = $exchangeObject;
        return $this;
    }

    public function out(ExchangeObjectInterface $exchangeObject)
    {
        $this->query->out = $exchangeObject;
        return $this;
    }

    public function courses(Courses $courses)
    {
        $this->query->courses = $courses;
        return $this;
    }

    public function payment(PaymentSystemInterface $paymentSystem)
    {
        $this->query->payment = $paymentSystem;
        return $this;
    }

    public function getQuery(): \stdClass
    {
       return $this->query;
    }
}