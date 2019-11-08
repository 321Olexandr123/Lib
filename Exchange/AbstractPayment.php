<?php


namespace ExchangeBundle\Exchange;


use ExchangeBundle\Utils\PaymentConditionInterface;
use ExchangeBundle\Utils\PaymentSystemInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class AbstractPayment
 * @package ExchangeBundle\Exchange
 * @ORM\MappedSuperclass()
 */
abstract class AbstractPayment implements PaymentSystemInterface
{
    /**
     * @var array
     * @ORM\Column(type="json_array")
     */
    private $conditional;

    /**
     * @return string
     */
    abstract public function getSignature(): string;

    /**
     * @return string
     */
    abstract public function getName(): string;

    /**
     * @return float
     */
    abstract public function getMin(): float;

    /**
     * @return float
     */
    abstract public function getMax(): float;

    /**
     * @return array
     */
    public function getConditional(): array
    {
        return $this->conditional;
    }

    /**
     * @param array $conditional
     */
    public function setConditional(array $conditional): void
    {
        $this->conditional = $conditional;
    }

    /**
     * @param PaymentConditionInterface $condition
     */
    public function addConditional(PaymentConditionInterface $condition): void
    {
        $this->conditional[] = $condition;
    }
}