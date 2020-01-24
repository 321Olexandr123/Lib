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
        $res = null;
        $selling = $this->getOut()->getExchangeObject()->getSelling();
        $purchase = $this->getIn()->getExchangeObject()->getPurchase();

        switch ($this->getType()) {
            case "purchase":
                {
                    $res = $selling / $purchase;
                }
                break;
            case "selling":
                {
                    $res = $purchase / $selling;
                }
                break;
        }
        return $res;
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