<?php


namespace ExchangeBundle\Exchange;

use Exception;
use ExchangeBundle\Utils\ExchangePairInterface;

class Purchase implements Calculation
{

    /**
     * @inheritDoc
     * @throws Exception
     */
    public static function onChangeIn(float $count, ExchangePairInterface $pair): float
    {
        $result = null;

        $course = $pair->getCourse();

        $paymentPercent = $pair->getIn()->getPaymentSystem()->getPercent();
        $paymentConstant = $pair->getIn()->getPaymentSystem()->getConstant();
        $exchangePercent = $pair->getOut()->getPaymentSystem()->getPercent();
        $exchangeConstant = $pair->getOut()->getPaymentSystem()->getConstant();

        $currencyTmp = $count - ($count * $paymentPercent) / 100 - $paymentConstant;
        $cryptocurrencyTmp = $currencyTmp / $course;

        $result = $cryptocurrencyTmp * (1 - $exchangePercent / 100) - $exchangeConstant;

        return $result;
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public static function onChangeOut(float $count, ExchangePairInterface $pair): float
    {
        $result = null;

        $course = $pair->getCourse();

        $paymentPercent = $pair->getIn()->getPaymentSystem()->getPercent();
        $paymentConstant = $pair->getIn()->getPaymentSystem()->getConstant();
        $exchangePercent = $pair->getOut()->getPaymentSystem()->getPercent();
        $exchangeConstant = $pair->getOut()->getPaymentSystem()->getConstant();

        $cryptocurrencyTmp = ($count + $exchangeConstant) / (1 - $exchangePercent / 100);
        $currencyTmp = $course * $cryptocurrencyTmp;

        $result = ($currencyTmp + $paymentConstant) / (1 - $paymentPercent / 100);

        return $result;
    }
}