<?php


namespace ExchangeBundle\Service;


use ExchangeBundle\Exchange\Calculation;

class Exchange
{
    public static function Calculation(string $type): Calculation
    {
        $type = ucfirst(strtolower($type));
        return ExchangeType::getType()->$type;
    }
}