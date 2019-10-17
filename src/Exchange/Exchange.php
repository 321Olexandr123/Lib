<?php

namespace Exchange;

use Exchange\State\Concrete\Course;
use Exchange\State\Concrete\Purchase;
use Exchange\State\Concrete\Selling;
use Exchange\Utils\ExchangeBuilder;

use Exchange\Utils\ExchangeObjectInterface;
use Exchange\Utils\PaymentSystem;

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

    public function payment(PaymentSystem $paymentSystem)
    {
        $this->query->payment = $paymentSystem;
        return $this;
    }

    public function getResult()
    {
        $context = $this->query->courses;

        $this->query->course = $context->setState(new Course())->handle($this->query->in, $this->query->out);
        $this->query->selling = $context->setState(new Selling())->handle($this->query->in, $this->query->out);
        $this->query->purchase = $context->setState(new Purchase())->handle($this->query->in, $this->query->out);

        return $this->query;
    }
}