<?php


namespace Exchange\Extension;

use Exchange\Extension\Runtime\CalculationRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class CalculationExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('exchange', [CalculationRuntime::class, 'action']),
        ];
    }
}