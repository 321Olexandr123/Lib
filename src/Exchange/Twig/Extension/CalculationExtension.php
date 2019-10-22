<?php


namespace Exchange\Twig\Extension;

use Symfony\Component\Yaml\Yaml;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class CalculationExtension extends AbstractExtension
{
    public function __construct()
    {
        $array = [
            'foo' => 'bar',
            'bar' => ['foo' => 'bar', 'bar' => 'baz'],
        ];

        $yaml = Yaml::dump($array);

        file_put_contents('/config/services.yaml', $yaml);
    }

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
