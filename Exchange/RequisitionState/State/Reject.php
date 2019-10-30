<?php


namespace ExchangeBundle\Exchange\RequisitionState\State;


use ExchangeBundle\Exchange\RequisitionState\State;

class Reject extends State
{

    public function __construct()
    {
        parent::__construct();
        $this->name = RequisitionState::REJECT;
    }

    public function template(): string
    {
        return '@Exchange/requisition/state/reject.html.twig';
    }
}