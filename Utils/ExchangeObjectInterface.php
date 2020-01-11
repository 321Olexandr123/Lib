<?php
namespace ExchangeBundle\Utils;

interface ExchangeObjectInterface
{
    /**
     * @return mixed
     */
    public function getAbbreviation():string;

    /**
     * @return float
     */
    public function getCourse(): float;

    /**
     * @return float
     */
    public function getSelling(): float;

    /**
     * @return float
     */
    public function getPurchase(): float;
}