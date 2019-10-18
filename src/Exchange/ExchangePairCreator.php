<?php


namespace Exchange;


use Exchange\State\State;
use Exchange\Utils\ExchangePairInterface;

class ExchangePairCreator extends AbstractPairCreator
{
    /**
     * @return ExchangePairInterface
     * @throws \Exception
     */
    function build(): ExchangePairInterface
    {
        /** @var ExchangePairInterface $pair */
        $pair = $this->pair;

        $pair->setIn($this->data->in);
        $pair->setOut($this->data->out);
        /** @var State $course */
        foreach ($this->data->courses->stateList as $course) {
            $name = $this->data->courses->key($course);
            $methods = get_class_methods($pair);
            $method = 'set'.$name;

            if (in_array($method, $methods)){
                $pair->$method($course->handle($pair->getIn(), $pair->getOut()));
            } else {
                throw new \Exception("Not Found Method ".$method."()");
            }
        }
        $pair->setPayment($this->data->payment);

        return $pair;
    }
}