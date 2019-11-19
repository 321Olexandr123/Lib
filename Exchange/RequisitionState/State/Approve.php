<?php


namespace ExchangeBundle\Exchange\RequisitionState\State;


use ExchangeBundle\Exchange\RequisitionState\State;

class Approve extends State
{

    public function __construct()
    {
        parent::__construct();
        $this->name = RequisitionState::APPROVE;
    }

    public function template(): string
    {
        return '@Exchange/requisition/state/approve.html.twig';
    }
}