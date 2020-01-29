<?php


namespace ExchangeBundle\Utils;


interface PaymentSystemInterface
{
    /**
     * @return string
     */
    public function getName(): ?string;
}