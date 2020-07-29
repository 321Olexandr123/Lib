<?php


namespace ExchangeBundle\Exchange;


use ExchangeBundle\Utils\ExchangePairInterface;

class Selling implements Calculation
{
    /**
     * @inheritDoc
     */
    public static function onChangeIn(float $count, ExchangePairInterface $pair): float
    {
        $result = null;

        $course = $pair->getCourse();

        $paymentPercent = $pair->getIn()->getPercentSelling();
        $paymentConstant = $pair->getIn()->getConstantSelling();
        $exchangePercent = $pair->getOut()->getPercentSelling();
        $exchangeConstant = $pair->getOut()->getConstantSelling();

        $cryptocurrencyTmp = $count - ($count * $paymentPercent) / 100 - $paymentConstant;
        $currencyTmp = $cryptocurrencyTmp * $course;

        $result = $currencyTmp * (1 - $exchangePercent / 100) - $exchangeConstant;

        return $result;
    }

    /**
     * @inheritDoc
     */
    public static function onChangeOut(float $count, ExchangePairInterface $pair): float
    {
        $result = null;

        $course = $pair->getCourse();

        $paymentPercent = $pair->getIn()->getPercentSelling();
        $paymentConstant = $pair->getIn()->getConstantSelling();
        $exchangePercent = $pair->getOut()->getPercentSelling();
        $exchangeConstant = $pair->getOut()->getConstantSelling();

        $currencyTmp = ($count + $exchangeConstant) / (1 - $exchangePercent / 100);
        $cryptocurrencyTmp = $currencyTmp / $course;

        $result = ($cryptocurrencyTmp + $paymentConstant) / (1 - $paymentPercent / 100);

        return $result;
    }
}