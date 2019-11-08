<?php


namespace ExchangeBundle\Exchange;


use ExchangeBundle\Utils\PaymentConditionInterface;


/**
 * Class AbstractPaymentConditional
 * @package ExchangeBundle\Exchange
 */
class AbstractPaymentConditional implements PaymentConditionInterface
{

    private $leftBound;

    private $rightBound;

    private $percent;

    private $constant;

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            'left_bound' => $this->getLeftBound(),
            'right_bound' => $this->getRightBound(),
            'percent' => $this->getPercent(),
            'constant' => $this->getConstant(),
        ];
    }

    /**
     * @return float
     */
    public function getLeftBound(): float
    {
        return $this->leftBound;
    }

    /**
     * @param float $leftBound
     */
    public function setLeftBound(float $leftBound): void
    {
        $this->leftBound = $leftBound;
    }

    /**
     * @return float
     */
    public function getRightBound(): float
    {
        return $this->rightBound;
    }

    /**
     * @param float|null $rightBound
     */
    public function setRightBound(?float $rightBound): void
    {
        $this->rightBound = $rightBound;
    }

    /**
     * @return float
     */
    public function getPercent(): float
    {
        return $this->percent;
    }

    /**
     * @param float $percent
     */
    public function setPercent(float $percent): void
    {
        $this->percent = $percent;
    }

    /**
     * @return float
     */
    public function getConstant(): float
    {
        return $this->constant;
    }

    /**
     * @param float $constant
     */
    public function setConstant(float $constant): void
    {
        $this->constant = $constant;
    }



}