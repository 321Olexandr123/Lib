<?php


namespace Exchange\Twig\Extension;

use Exchange\AbstractCalculation;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;


class CalculationExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('area', [$this, 'calculateArea']),
        ];
    }

    public function calculateArea(int $width, int $length)
    {
        return $width * $length;
    }
}