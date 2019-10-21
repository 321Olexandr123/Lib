<?php
namespace Exchange;

use Exchange\Utils\ExchangeObjectInterface;

abstract class Cryptocurrency implements ExchangeObjectInterface
{
    protected $content;

    /**
     * Currency constructor.
     */
    public function __construct()
    {
        $webSite = 'http://rate.crpt.trading/cryptocurrency-course-by-abbr/get/cZX4PZrevVP9IG3cpVUeLIomU2XsCLhg_gkwhYcFhfk?cryptocurrency='.$this->abbreviation();
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