<?php


namespace ExchangeBundle\Utils;


interface PaymentConditionInterface
{
    public function getLeftBound();

    public function setLeftBound();

    public function getRightBound();

    public function setRightBound();
    
    public function getPercent();
    
    public function setPercent();

    public function getConstant();

    public function setConstant();
}