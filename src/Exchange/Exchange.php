<?php

namespace Exchange;

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

    /**
     * @param ExchangeObjectInterface $exchangeObject
     * @return $this|mixed
     */
    public function in(ExchangeObjectInterface $exchangeObject)
    {
        $this->reset();
        $this->query->in = $exchangeObject;
        return $this;
    }

    /**
     * @param ExchangeObjectInterface $exchangeObject
     * @return $this|mixed
     */
    public function out(ExchangeObjectInterface $exchangeObject)
    {
        $this->query->out = $exchangeObject;
        return $this;
    }

    /**
     * @param PaymentSystemInterface $paymentSystem
     * @return $this|mixed
     */
    public function payment(PaymentSystemInterface $paymentSystem)
    {
        $this->query->payment = $paymentSystem;
        return $this;
    }

    /**
     * @return void
     */
    private function course(): void
    {
        $this->query->course = $this->query->in->selling() / $this->query->out->purchase();
    }

    /**
     * @return \stdClass
     */
    public function getQuery(): \stdClass
    {
        $this->course();
        return $this->query;
    }
}