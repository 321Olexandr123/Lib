<?php


namespace ExchangeBundle\Twig\Extension;


use ExchangeBundle\Exchange\AbstractRequisition;
use ExchangeBundle\Exchange\RequisitionState\State;
use ExchangeBundle\Exchange\RequisitionState\State\Approve;
use ExchangeBundle\Exchange\RequisitionState\State\RequisitionState;
use ExchangeBundle\Exchange\RequisitionState\State\Waiting;
use ExchangeBundle\Utils\ExchangePairInterface;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class RequisitionExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('requisition_state', [$this, 'withRequisition'], ['is_safe' => ['html'], 'needs_environment' => true]),
            new TwigFunction('requisition_state', [$this, 'withState'], ['is_safe' => ['html'], 'needs_environment' => true]),
        ];
    }

    /**
     * @param Environment $environment
     * @param AbstractRequisition $abstractRequisition
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function withRequisition(Environment $environment, AbstractRequisition $abstractRequisition)
    {
        return $environment->render($abstractRequisition->getSate()->template(), [
        ]);
    }

    /**
     * @param Environment $environment
     * @param State $state
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function withState(Environment $environment, State $state)
    {
        return $environment->render($state->template(), [
        ]);
    }

}