<?php


namespace ExchangeBundle\Exchange;


use ExchangeBundle\Utils\ExchangePairInterface;
use ExchangeBundle\Utils\ExtendExchange;
use ExchangeBundle\Utils\PaymentSystemInterface;

/**
 * Class AbstractExchangePair
 * @package ExchangeBundle\Exchange
 */
abstract class AbstractExchangePair implements ExchangePairInterface
{

    abstract function setIn(): void;

    abstract function setOut(): void;

    /**
     * @return float
     */
    public function getCourse(): float
    {
        return $this->getOut()->getSelling() / $this->getIn()->getPurchase();
    }

    /**
     * @return ExtendExchange
     */
    abstract function getIn(): ExtendExchange;

    /**
     * @return ExtendExchange
     */
    abstract function getOut(): ExtendExchange;

    /**
     * @return PaymentSystemInterface
     */
    public function getPayment()
    {
        return $this->getOut()->getPayment();
    }
}