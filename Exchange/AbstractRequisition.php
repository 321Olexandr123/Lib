<?php


namespace ExchangeBundle\Exchange;


use ExchangeBundle\Exchange\RequisitionState\State;
use ExchangeBundle\Utils\ExchangePairInterface;
use ExchangeBundle\Utils\PaymentSystemInterface;

abstract class AbstractRequisition
{
    protected $state;

    /**
     * @return ExchangePairInterface
     */
    abstract public function getPair(): ExchangePairInterface;

    /**
     * @param ExchangePairInterface $exchangePair
     */
    abstract public function setPair(ExchangePairInterface $exchangePair): void;

    /**
     * @return float
     */
    abstract public function getCourse(): float;

    /**
     * @param float $course
     */
    abstract public function setCourse(float $course): void;

    /**
     * @param float $count
     */
    abstract public function setIn(float $count): void;

    /**
     * @return float
     */
    abstract public function getIn(): float;

    /**
     * @param float $count
     */
    abstract public function setOut(float $count): void;

    /**
     * @return float
     */
    abstract public function getOut(): float;

    /**
     * @return PaymentSystemInterface
     */
    public function getPayment()
    {
        return $this->getPair()->getOut()->getPayment();
    }

    /**
     * @param State $state
     */
    public function transitionTo(State $state): void
    {
        $this->state = $state;
    }

    /**
     * @param State $state
     */
    abstract public function setState(State $state): void;

    /**
     * @return State
     */
    public function getSate(): State
    {
        return $this->state;
    }
}