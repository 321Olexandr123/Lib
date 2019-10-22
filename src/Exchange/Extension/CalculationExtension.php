<?php


namespace Exchange\Extension;

use Exchange\AbstractCalculation;
use Exchange\Extension\Runtime\CalculationRuntime;


class CalculationExtension
{
    public function getFunctions()
    {
        return [
            new \Twig_Function('area', [$this, 'calculateArea']),
        ];
    }

    public function calculateArea(int $width, int $length)
    {
        return $width * $length;
    }
}