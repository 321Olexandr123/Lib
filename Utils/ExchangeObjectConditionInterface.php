<?php


namespace ExchangeBundle\Utils;


interface ExchangeObjectConditionInterface
{
    /**
     * @return float
     */
    public function getConstant(): float;

    /**
     * @return float
     */
    public function getPercent(): float;
}