<?php


namespace ExchangeBundle\Utils;


interface CalculationInterface
{
    public function onChangeIn(): float;

    public function onChangeOut(): float;
}