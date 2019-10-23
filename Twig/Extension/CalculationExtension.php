<?php


namespace ExchangeBundle\Twig\Extension;

use Symfony\Component\Yaml\Yaml;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class CalculationExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('exchange', [$this, 'exchange']),
        ];
    }

    public function exchange(int $width, int $length)
    {
        return $width * $length;
    }
}
