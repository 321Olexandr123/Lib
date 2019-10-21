<?php


namespace Exchange;

use Exchange\Utils\ExchangePairInterface;

class ExchangePairCreator extends AbstractPairCreator
{
    /**
     * @param ExchangePairInterface $pair
     * @param \stdClass $data
     * @return ExchangePairInterface
     */
    public static function build(ExchangePairInterface $pair, \stdClass $data): ExchangePairInterface
    {
        /** @var ExchangePairInterface $pair */
        $pair->setIn($data->in);
        $pair->setOut($data->out);
        $pair->setCourse($data->course);
        $pair->setPayment($data->payment);

        return $pair;
    }
}