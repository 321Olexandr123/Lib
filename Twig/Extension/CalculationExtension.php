<?php


namespace ExchangeBundle\Twig\Extension;

use Doctrine\Common\Collections\ArrayCollection;
use ExchangeBundle\Utils\ExchangeObjectInterface;
use ExchangeBundle\Utils\ExchangePairInterface;
use Symfony\Component\Config\Definition\Exception\Exception;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class CalculationExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('exchange', [$this, 'exchange'], ['needs_environment' => true]),
            new TwigFunction('exchange_in', [$this, 'in'], ['needs_environment' => true]),
            new TwigFunction('exchange_out', [$this, 'out'], ['needs_environment' => true]),
        ];
    }

    /**
     * @param ExchangePairInterface $pair
     * @param Environment $environment
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function exchange(ExchangePairInterface $pair,Environment $environment)
    {
        return $environment->render('@Resources/views/exchange.html.twig', [
            'pair' => $pair
        ]);
    }

    /**
     * @param ExchangeObjectInterface $exchangeObject
     * @param Environment $environment
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function in(ExchangeObjectInterface $exchangeObject,Environment $environment)
    {
        return $environment->render('@Resources/views/object.html.twig', [
            'object' => $exchangeObject
        ]);
    }

    /**
     * @param ExchangeObjectInterface $exchangeObject
     * @param Environment $environment
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function out(ExchangeObjectInterface $exchangeObject,Environment $environment)
    {
        return $environment->render('@Resources/views/object.html.twig', [
            'object' => $exchangeObject
        ]);
    }
}
