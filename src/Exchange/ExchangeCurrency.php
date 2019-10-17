<?php

namespace Exchange;

use Exchange\State\Concrete\Course;
use Exchange\State\Concrete\Purchase;
use Exchange\State\Concrete\Selling;
use Exchange\Utils\ExchangeBuilder;

use Exchange\Utils\ExchangeObjectInterface;
use Exchange\Utils\PaymentSystemInterface;

class ExchangeCurrency implements ExchangeBuilder, \JsonSerializable
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

    public function getResult()
    {
        /**
         * @var Courses $context
         */
        $context = $this->query->courses;

        $this->query->course = $context->setState(new Course())->handle($this->query->in, $this->query->out);
        $this->query->selling = $context->setState(new Selling())->handle($this->query->in, $this->query->out);
        $this->query->purchase = $context->setState(new Purchase())->handle($this->query->in, $this->query->out);

        return $this->jsonSerialize();
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            'in' => $this->query->in,
            'out' => $this->query->out,
            'course' => $this->query->course,
            'selling' => $this->query->selling,
            'purchase' => $this->query->purchase,
        ];
    }
}