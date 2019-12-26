<?php


namespace ExchangeBundle\Exchange;


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

    public function jsonSerialize()
    {
        $in = $this->getIn();
        $out = $this->getOut();
        return [
            "in" => [
                "abbreviation" => $in->getAbbreviation(),
                "selling" => $in->getSelling(),
                "purchase" => $in->getPurchase(),
                "course" => $in->getCourse(),
                "payment" => [
                    "signature" => $in->getPayment()->getSignature(),
                    "name" => $in->getPayment()->getName(),
                    'conditional' => $in->getPayment()->getConditional(),
                    "min" => $in->getPayment()->getMin(),
                    "max" => $in->getPayment()->getMax()
                ]
            ],
            "out" => [
                "abbreviation" => $out->getAbbreviation(),
                "selling" => $out->getSelling(),
                "purchase" => $out->getPurchase(),
                "course" => $out->getCourse(),
                "payment" => [
                    "signature" => $out->getPayment()->getSignature(),
                    "name" => $out->getPayment()->getName(),
                    'conditional' => $out->getPayment()->getConditional(),
                    "min" => $out->getPayment()->getMin(),
                    "max" => $out->getPayment()->getMax()
                ]
            ],
            "course" => $this->getCourse()
        ];
    }
}