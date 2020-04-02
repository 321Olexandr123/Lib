<?php


namespace ExchangeBundle\Utils;


interface PaymentSystemInterface
{
    /**
     * @return string
     */
    public function getName(): ?string;

    public function getMin(): ?float;

    public function getMax(): ?float;
}