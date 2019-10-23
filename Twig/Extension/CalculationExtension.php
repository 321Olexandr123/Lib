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
    /**
     * @var Environment
     */
    private $environment;

    /**
     * CalculationExtension constructor.
     * @param Environment $environment
     */
    public function __construct(Environment $environment)
    {
        $this->environment = $environment;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('exchange', [$this, 'exchange']),
            new TwigFunction('exchange_in', [$this, 'in']),
            new TwigFunction('exchange_out', [$this, 'out']),
        ];
    }

    /**
     * @param ExchangePairInterface $pair
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function exchange(ExchangePairInterface $pair)
    {
        return $this->environment->render('@Resources/views/exchange.html.twig', [
            'pair' => $pair
        ]);
    }

    /**
     * @param ExchangeObjectInterface $exchangeObject
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function in(ExchangeObjectInterface $exchangeObject)
    {
        return $this->environment->render('@Resources/views/object.html.twig', [
            'object' => $exchangeObject
        ]);
    }

    /**
     * @param ExchangeObjectInterface $exchangeObject
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function out(ExchangeObjectInterface $exchangeObject)
    {
        return $this->environment->render('@Resources/views/object.html.twig', [
            'object' => $exchangeObject
        ]);
    }
}
