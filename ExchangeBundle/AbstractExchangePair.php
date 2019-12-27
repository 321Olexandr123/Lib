<?php


namespace ExchangeBundle\ExchangeBundle;


use ExchangeBundle\Utils\ExchangeObjectInterface;
use ExchangeBundle\Utils\ExchangePairInterface;
use Doctrine\ORM\Mapping as ORM;
use ExchangeBundle\Utils\PaymentSystemInterface;

/**
 * Class AbstractExchangePair
 * @package ExchangeBundle\Exchange
 */
abstract class AbstractExchangePair implements ExchangePairInterface
{
    /**
     * @param ExchangeObjectInterface $exchangeObject
     */
    abstract function setIn(ExchangeObjectInterface $exchangeObject): void;

    /**
     * @param ExchangeObjectInterface $exchangeObject
     */
    abstract function setOut(ExchangeObjectInterface $exchangeObject): void;

    /**
     * @return float
     */
    public function getCourse(): float
    {
        return $this->getOut()->getSelling() / $this->getIn()->getPurchase();
    }

    /**
     * @return ExchangeObjectInterface
     */
    abstract function getIn(): ExchangeObjectInterface;

    /**
     * @return ExchangeObjectInterface
     */
    abstract function getOut(): ExchangeObjectInterface;

    /**
     * @return PaymentSystemInterface
     */
    public function getPayment()
    {
        return $this->getOut()->getPayment();
    }
}