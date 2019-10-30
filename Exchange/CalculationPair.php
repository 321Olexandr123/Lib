<?php


namespace ExchangeBundle\Exchange;


use ExchangeBundle\Utils\ExchangePairInterface;

class CalculationPair extends AbstractCalculationPair
{

    static function changeIn(float $count, ExchangePairInterface $pair): float
    {
        $course = $pair->getCourse();
        $payment = $pair->getOut()->getPayment();
        $tmp = min(max($payment->getMin(), $count * $payment->getPercent() / 100), $payment->getMax()) + $payment->getConstant();
        $noComission = $count - $tmp;
        $result = $noComission * $course;
        return $result;
    }

    static function changeOut(float $count, ExchangePairInterface $pair): float
    {
        $course = $pair->getCourse();
        $payment = $pair->getOut()->getPayment();
        $result = ($count / $course + $payment->getConstant()) / ((100 - $payment->getPercent()) / 100);
        return $result;
    }
}