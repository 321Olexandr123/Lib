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

        $paymentPercent = $pair->getIn()->getPaymentPercent();
        $paymentConstant = $pair->getIn()->getPaymentConstant();
        $exchangePercent = $pair->getOut()->getExchangePercent();
        $exchangeConstant = $pair->getOut()->getExchangeConstant();

        $cryptocurrencyTmp = $count - ($count * $exchangePercent) / 100 - $exchangeConstant;
        $currencyTmp = $cryptocurrencyTmp * $course;

        $result = $currencyTmp * (1 - $paymentPercent / 100) - $paymentConstant;

        return $result;
    }

    /**
     * @inheritDoc
     */
    public static function onChangeOut(float $count, ExchangePairInterface $pair): float
    {
        $result = null;

        $course = $pair->getCourse();

        $paymentPercent = $pair->getIn()->getPaymentPercent();
        $paymentConstant = $pair->getIn()->getPaymentConstant();
        $exchangePercent = $pair->getOut()->getExchangePercent();
        $exchangeConstant = $pair->getOut()->getExchangeConstant();

        $currencyTmp = ($count + $paymentConstant) / (1 - $paymentPercent / 100);
        $cryptocurrencyTmp = $currencyTmp / $course;

        $result = ($cryptocurrencyTmp + $exchangeConstant) / (1 - $exchangePercent / 100);

        return $result;
    }
}