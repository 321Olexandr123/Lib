<?php


namespace Exchange;


use Exchange\Utils\ExchangePairInterface;

class ExchangePairCreator extends AbstractPairCreator
{
    function build(): ExchangePairInterface
    {
        /** @var ExchangePairInterface $pair */
        $pair = $this->pair;

        $pair->setIn($this->data->in);
        $pair->setOut($this->data->out);
        $pair->setCourses($this->data->courses);
        $pair->setPayment($this->data->payment);

        return $pair;
    }
}