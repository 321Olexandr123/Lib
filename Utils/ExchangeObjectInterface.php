<?php

namespace ExchangeBundle\Utils;

interface ExchangeObjectInterface
{
    /**
     * @return mixed
     */
    public function getAbbreviation(): string;

    /**
     * @return float
     */
    public function getCourse(): float;

    /**
     * @return float|null
     */
    public function getSelling(): ?float;

    /**
     * @return float|null
     */
    public function getPurchase(): ?float;
}