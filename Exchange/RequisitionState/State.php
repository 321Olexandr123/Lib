<?php


namespace ExchangeBundle\Exchange\RequisitionState;


use ExchangeBundle\Exchange\AbstractRequisition;
use ExchangeBundle\Exchange\RequisitionState\State\RequisitionState;

abstract class State
{
    protected $requisition;

    protected $name;

    /**
     * State constructor.
     */
    public function __construct()
    {
        $this->name = RequisitionState::WAITING;
    }

    /**
     * @param AbstractRequisition $requisition
     */
    public function setRequisition(AbstractRequisition $requisition): void
    {
        $this->requisition = $requisition;
    }

    /**
     *
     */
    public function getName(): void
    {
        return $this->name;
    }

    /**
     * @return string
     * {@inheritDoc}
     */
    public function template(): string
    {
        return '@Exchange/requisition/state/basic.html.twig';
    }

    public function __toString()
    {
        return $this->name;
    }
}