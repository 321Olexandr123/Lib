<?php
namespace Exchange\Utils;

interface ExchangeObjectInterface
{
    /**
     * @return mixed
     */
    function abbreviation();

    /**
     * @return float
     */
    public function course(): float;

    /**
     * @return float
     */
    public function selling(): float;

    /**
     * @return float
     */
    public function purchase(): float;
}