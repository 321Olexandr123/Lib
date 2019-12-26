<?php

namespace ExchangeBundle\Utils;


interface ExchangePairBuilderInterface
{
    /**
     * @param ExchangeObjectInterface $exchangeObject
     * @return mixed
     */
    public function in(ExchangeObjectInterface $exchangeObject);

    /**
     * @param ExchangeObjectInterface $exchangeObject
     * @return mixed
     */
    public function out(ExchangeObjectInterface $exchangeObject);

    /**
     * @return \stdClass
     */
    public function build(): \stdClass;

}