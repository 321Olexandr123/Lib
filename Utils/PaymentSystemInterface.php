<?php


namespace ExchangeBundle\Utils;


interface PaymentSystemInterface
{
    /**
     * @return string
     */
    public function getName(): ?string;

    /**
     * @return float|null
     */
    public function getMin(): ?float;

    /**
     * @return float|null
     */
    public function getMax(): ?float;
}