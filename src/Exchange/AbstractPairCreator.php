<?php


namespace Exchange;


use Exchange\Utils\ExchangeBuilder;
use Exchange\Utils\ExchangePairInterface;

abstract class AbstractPairCreator
{
    /**
     * @var ExchangePairInterface
     */
    protected $pair;
    /**
     * @var \stdClass
     */
    protected $data;

    /**
     * ExchangePairCreator constructor.
     * @param ExchangePairInterface $pair
     * @param \stdClass $data
     */
    public function __construct(ExchangePairInterface $pair, \stdClass $data)
    {
        $this->pair = $pair;
        $this->data = $data;
    }

    abstract function build(): ExchangePairInterface;
}