<?php



namespace Exchange\Extension\Runtime;


use Exchange\Utils\ExchangePairInterface;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Extension\RuntimeExtensionInterface;
use Twig_Environment;

class CalculationRuntime implements RuntimeExtensionInterface
{
    /**
     * @var Twig_Environment
     */
    private $environment;

    /**
     * CalculationRuntime constructor.
     * @param Environment $environment
     */
    public function __construct(Environment $environment)
    {
        $this->environment = $environment;
    }

    /**
     * @param ExchangePairInterface $exchangePair
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function action(ExchangePairInterface $exchangePair)
    {
        return $this->environment->render('@Exchange/Template/calculation.html.twig', [
            'pair' => $exchangePair
        ]);
    }
}