<?php


namespace ExchangeBundle\Exchange;


use ExchangeBundle\Service\Settings;
use ExchangeBundle\Utils\ExchangePairInterface;

class Purchase implements Calculation
{
    const REQUIRED_PURCHASE = ['percent', 'constant'];

    /**
     * @inheritDoc
     * @throws \Exception
     */
    public static function onChangeIn(float $count, ExchangePairInterface $pair, $params = []): float
    {
        Settings::validate(self::REQUIRED_PURCHASE, $params);
        //        TODO Саша сделаешь формулы


//        $course = $pair->getCourse();
//        $payment = $pair->getOut()->getPayment();
//        $conditional = ConditionalFinder::find($payment->getConditional(), $count);
//
//        $tmp = min(max($payment->getMin(), $count * $conditional->getPercent() / 100), $payment->getMax()) + $conditional->getConstant();
//        $noCommission = $count - $tmp;
//        $result = $noCommission * $course;
//
//        return $result * (1 - $params['percent'] / 100) - $params['constant'];
    }

    /**
     * @inheritDoc
     * @throws \Exception
     */
    public static function onChangeOut(float $count, ExchangePairInterface $pair, $params = []): float
    {
        Settings::validate(self::REQUIRED_PURCHASE, $params);

        //        TODO Саша сделаешь формулы

//        $course = $pair->getCourse();
//        $payment = $pair->getOut()->getPayment();
//        $conditional = ConditionalFinder::find($payment->getConditional(), $count);
//
//        $result = ($count / $course + $conditional->getConstant()) / ((100 - $conditional->getPercent()) / 100);
//
//        return $result ;
    }
}