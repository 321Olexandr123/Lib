<?php


namespace ExchangeBundle\Exchange;


use ExchangeBundle\Utils\ExchangeObjectInterface;
use ExchangeBundle\Utils\ExchangePairInterface;

abstract class AbstractExchangePair implements ExchangePairInterface
{
    /**
     * @param ExchangeObjectInterface $exchangeObject
     */
    abstract function setIn(ExchangeObjectInterface $exchangeObject): void ;

    /**
     * @param ExchangeObjectInterface $exchangeObject
     */
    abstract function setOut(ExchangeObjectInterface $exchangeObject): void ;

    /**
     * @param float $course
     */
    abstract function setCourse(float $course): void ;

    /**
     * @return ExchangeObjectInterface
     */
    abstract function getIn(): ExchangeObjectInterface;

    /**
     * @return ExchangeObjectInterface
     */
    abstract function getOut(): ExchangeObjectInterface;

    /**
     * @return float
     */
    abstract function getCourse(): float;

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
                    "constant" => $in->getPayment()->getConstant(),
                    "percent" => $in->getPayment()->getPercent(),
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
                    "constant" => $out->getPayment()->getConstant(),
                    "percent" => $out->getPayment()->getPercent(),
                    "min" => $out->getPayment()->getMin(),
                    "max" => $out->getPayment()->getMax()
                ]
            ],
            "course" => $this->getCourse()
        ];
    }
}