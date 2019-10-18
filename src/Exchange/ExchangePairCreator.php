<?php


namespace Exchange;


use Exchange\State\State;
use Exchange\Utils\ExchangePairInterface;

class ExchangePairCreator extends AbstractPairCreator
{
    /**
     * @param ExchangePairInterface $pair
     * @param $data
     * @return ExchangePairInterface
     * @throws \Exception
     */
    public static function build(ExchangePairInterface $pair, \stdClass $data): ExchangePairInterface
    {
        /** @var ExchangePairInterface $pair */
        $pair->setIn($data->in);
        $pair->setOut($data->out);
        /** @var State $course */
        foreach ($data->courses->stateList as $course) {
            $name = $data->courses->key($course);
            $methods = get_class_methods($pair);
            $method = 'set' . $name;

            if (in_array($method, $methods)) {
                $pair->$method($course->handle($pair->getIn(), $pair->getOut()));
            } else {
                throw new \Exception("Not Found Method " . $method . "()");
            }
        }
        $pair->setPayment($data->payment);

        return $pair;
    }
}