<?php


namespace ExchangeBundle\Exchange;


use ExchangeBundle\Utils\ExchangePairInterface;

class CalculationPair extends AbstractCalculationPair
{

    static function onChangeIn(float $count, ExchangePairInterface $pair): float
    {
        $course = $pair->getCourse();
        $payment = $pair->getOut()->getPayment();
        $conditional = ConditionalFinder::find($payment->getConditional(), $count);

        $tmp = min(max($payment->getMin(), $count * $conditional->getPercent() / 100), $payment->getMax()) + $conditional->getConstant();
        $noCommission = $count - $tmp;
        $result = $noCommission * $course;
        return $result;
    }

    static function onChangeOut(float $count, ExchangePairInterface $pair): float
    {
        $course = $pair->getCourse();
        $payment = $pair->getOut()->getPayment();
        $conditional = ConditionalFinder::find($payment->getConditional(), $count);

        $result = ($count / $course + $conditional->getConstant()) / ((100 - $conditional->getPercent()) / 100);
        return $result;
    }
}