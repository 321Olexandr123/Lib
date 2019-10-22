<?php


namespace Exchange\Utils;


interface CalculationInterface
{
    public function pair(): ExchangePairInterface;

    public function onChangeIn(): float;

    public function onChangeOut(): float;
}