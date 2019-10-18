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

    public function getResult()
    {

        /** @var State $course */
        foreach ($this->query->courses->stateList as $course) {
            $name = strtolower($this->query->courses->key($course));
            $this->query->course[$name] = $course->handle($this->query->in, $this->query->out);
        }

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
            'payment' => [
                'name' => $this->query->payment->name(),
                'min' => $this->query->payment->min(),
                'max' => $this->query->payment->max(),
                'constant' => $this->query->payment->constant(),
                'percent' => $this->query->payment->percent(),
            ]
        ];
    }
}