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
     * @var PaymentConditionInterface
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
     * @return PaymentConditionInterface
     */
    public function getConditional(): PaymentConditionInterface
    {
        return $this->conditional;
    }

    /**
     * @param PaymentConditionInterface $conditional
     */
    public function setConditional(PaymentConditionInterface $conditional): void
    {
        $this->conditional = $conditional;
    }
}