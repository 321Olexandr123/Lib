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
            new TwigFunction('exchange', [$this, 'exchange'], ['is_safe' => ['html'], 'needs_environment' => true]),
            new TwigFunction('exchange_in', [$this, 'in'], ['is_safe' => ['html'], 'needs_environment' => true]),
            new TwigFunction('exchange_out', [$this, 'out'], ['is_safe' => ['html'], 'needs_environment' => true]),
            new TwigFunction('exchange_pair', [$this, 'pair'], ['is_safe' => ['html'], 'needs_environment' => true])
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
    public function exchange(Environment $environment, ExchangePairInterface $pair)
    {
        return $environment->render('@Exchange/exchange.html.twig', [
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
    public function in(Environment $environment, ExchangeObjectInterface $exchangeObject)
    {
        return $environment->render('@Exchange/exchange_in.html.twig', [
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
    public function out(Environment $environment, ExchangeObjectInterface $exchangeObject)
    {
        return $environment->render('@Exchange/exchange_out.html.twig', [
            'object' => $exchangeObject
        ]);
    }

    /**
     * @param array $pair
     * @param Environment $environment
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function pair(array $pair, Environment $environment)
    {
        return $environment->render('@Exchange/exchange_pair.html.twig');
    }
}
