<?php

namespace Exchange;

use Exchange\Utils\ExchangeBuilder;

use Exchange\Utils\ExchangeObjectInterface;
use Exchange\Utils\PaymentSystem;

class Exchange implements ExchangeBuilder
{
    protected $query;
    protected $content;

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

    public function context(Courses $courses)
    {
        $this->query->course = $courses;
        return $this;
    }

    public function payment(PaymentSystem $paymentSystem)
    {
        $this->query->payment = $paymentSystem;
        return $this;
    }

    public function course()
    {
        return $this->content[$this->query->from . ' to ' . $this->query->to]['course'];
    }

    public function selling()
    {
        return $this->content[$this->query->from . ' to ' . $this->query->to]['selling'];
    }

    public function purchase()
    {
        return $this->content[$this->query->from . ' to ' . $this->query->to]['purchase'];
    }

    public function getResult(): array
    {
        $webSite = 'http://rate.crpt.trading/currency-courses-by-abbr/get/cZX4PZrevVP9IG3cpVUeLIomU2XsCLhg_gkwhYcFhfk?currency_pair=' . $this->query->from . '_' . $this->query->to;
        $content = file_get_contents($webSite);
        $this->content = json_decode($content, true);

        $this->query->course = $this->course();
        $this->query->selling = $this->selling();
        $this->query->purchase = $this->purchase();

        return $this->query;
    }
}