<?php


namespace ExchangeBundle\Exchange;

use ExchangeBundle\Utils\ExchangePairInterface;
use ExchangeBundle\Utils\PaymentSystemInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class AbstractRequisition
 * @package ExchangeBundle\Exchange
 * @ORM\MappedSuperclass()
 */
abstract class AbstractRequisition
{
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
    abstract public function setInCount(float $count): void;

    /**
     * @return float
     */
    abstract public function getInCount(): float;

    /**
     * @param float $count
     */
    abstract public function setOutCount(float $count): void;

    /**
     * @return float
     */
    abstract public function getOutCount(): float;

    /**
     * @return PaymentSystemInterface
     */
    public function getPayment()
    {
        return $this->getPair()->getOut()->getPayment();
    }
}