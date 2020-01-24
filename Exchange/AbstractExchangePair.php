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

    abstract function setIn(ExtendExchange $extendExchange): void;

    abstract function setOut(ExtendExchange $extendExchange): void;

    /**
     * @return float
     */
    public function getCourse(): float
    {
        return $this->getOut()->getExchangeObject()->getSelling() * $this->getIn()->getExchangeObject()->getPurchase();
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
     * @return string
     */
    abstract function getType(): string;

    /**
     * @return PaymentSystemInterface
     */
    public function getPayment()
    {
        return $this->getOut()->getPaymentSystem();
    }
}