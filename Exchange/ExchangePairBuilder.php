<?php

namespace ExchangeBundle\Exchange;
use ExchangeBundle\Utils\ExchangePairBuilderInterface;
use ExchangeBundle\Utils\ExchangeObjectInterface;
use ExchangeBundle\Utils\PaymentSystemInterface;

class ExchangePairBuilder implements ExchangePairBuilderInterface
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
     * @return void
     */
    private function course(): void
    {
        $this->query->course = $this->query->out->getSelling() / $this->query->in->getPurchase();
    }

    /**
     * @return \stdClass
     */
    public function build(): \stdClass
    {
        $this->course();
        return $this->query;
    }
}