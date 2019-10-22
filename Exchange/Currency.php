<?php

namespace ExchangeBundle\Exchange;
use ExchangeBundle\Utils\ExchangeObjectInterface;

abstract class Currency implements ExchangeObjectInterface
{
    protected $content;

    /**
     * Currency constructor.
     */
    public function __construct()
    {
        $webSite = 'http://rate.crpt.trading/currency-course-by-abbr/get/cZX4PZrevVP9IG3cpVUeLIomU2XsCLhg_gkwhYcFhfk?currency=' . $this->abbreviation();
        $content = file_get_contents($webSite);
        $this->content = json_decode($content, true);
    }

    abstract public function abbreviation();

    public function course(): float
    {
        return $this->content[$this->abbreviation()]['price'];
    }

    public function selling(): float
    {
        return $this->content[$this->abbreviation()]['selling'];
    }

    public function purchase(): float
    {
        return $this->content[$this->abbreviation()]['purchase'];
    }
}