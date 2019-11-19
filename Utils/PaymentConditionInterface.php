<?php


namespace ExchangeBundle\Utils;


interface PaymentConditionInterface extends \JsonSerializable
{
    /**
     * @return float
     */
    public function getLeftBound(): float;

    /**
     * @param float $bound
     * @return void
     */
    public function setLeftBound(float $bound): void;

    /**
     * @return float
     */
    public function getRightBound(): float;

    /**
     * @param float|null $bound
     * @return void
     */
    public function setRightBound(?float $bound): void;

    /**
     * @return float
     */
    public function getPercent(): float;

    /**
     * @param float $bound
     * @return void
     */
    public function setPercent(float $bound): void;

    /**
     * @return float
     */
    public function getConstant(): float;

    /**
     * @param float $bound
     * @return void
     */
    public function setConstant(float $bound): void;
}