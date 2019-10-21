<?php



namespace Exchange\Extension\Runtime;


use Exchange\Utils\ExchangePairInterface;
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
    private $twig_Environment;

    /**
     * CalculationRuntime constructor.
     * @param Twig_Environment $twig_Environment
     */
    public function __construct(Twig_Environment $twig_Environment)
    {
        $this->twig_Environment = $twig_Environment;
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
        return $this->twig_Environment->render('@Exchange/Template/calculation.html.twig', [
            'pair' => $exchangePair
        ]);
    }
}