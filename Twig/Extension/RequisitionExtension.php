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
use Twig\TwigFilter;
use Twig\TwigFunction;

class RequisitionExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('requisition_state', [$this, 'withRequisition'], ['is_safe' => ['html'], 'needs_environment' => true]),
            new TwigFunction('requisition_in', [$this, 'exchangeIn'], ['is_safe' => ['html'], 'needs_environment' => true]),
            new TwigFunction('requisition_out', [$this, 'exchangeOut'], ['is_safe' => ['html'], 'needs_environment' => true]),
            new TwigFunction('requisition_course', [$this, 'course'], ['is_safe' => ['html'], 'needs_environment' => true]),
        ];
    }

    public function getFilters()
    {
        return [
            new TwigFilter('requisition_in', [$this, 'in'], ['is_safe' => ['html'], 'needs_environment' => true]),
            new TwigFilter('requisition_out', [$this, 'out'], ['is_safe' => ['html'], 'needs_environment' => true]),
            new TwigFilter('requisition_course', [$this, 'course'], ['is_safe' => ['html'], 'needs_environment' => true]),
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
        return $environment->render($abstractRequisition->getState()->template(), [
        ]);
    }

    /**
     * @param Environment $environment
     * @param AbstractRequisition $abstractRequisition
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function exchangeIn(Environment $environment, AbstractRequisition $abstractRequisition)
    {
        return $environment->render('@Exchange/requisition/exchange_in.html.twig', [
            'requisition' => $abstractRequisition
        ]);
    }

    /**
     * @param Environment $environment
     * @param AbstractRequisition $abstractRequisition
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function exchangeOut(Environment $environment, AbstractRequisition $abstractRequisition)
    {
        return $environment->render('@Exchange/requisition/exchange_out.html.twig', [
            'requisition' => $abstractRequisition
        ]);
    }

    /**
     * @param Environment $environment
     * @param AbstractRequisition $abstractRequisition
     * @return float
     */
    public function in(Environment $environment, AbstractRequisition $abstractRequisition): float
    {
        return $abstractRequisition->getInCount();
    }

    /**
     * @param Environment $environment
     * @param AbstractRequisition $abstractRequisition
     * @return float
     */
    public function out(Environment $environment, AbstractRequisition $abstractRequisition): float
    {
        return $abstractRequisition->getOutCount();
    }

    public function course(Environment $environment, AbstractRequisition $abstractRequisition): float
    {
        return $abstractRequisition->getCourse();
    }

}