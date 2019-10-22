<?php


namespace Exchange\Twig\Extension;

use Exchange\AbstractCalculation;
use Twig\Extension\AbstractExtension;


class CalculationExtension extends AbstractExtension
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