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

        $paymentPercent = $pair->getIn()->getPercentPurchase();
        $paymentConstant = $pair->getIn()->getConstantPurchase();
        $exchangePercent = $pair->getOut()->getPercentPurchase();
        $exchangeConstant = $pair->getOut()->getConstantPurchase();

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

        $paymentPercent = $pair->getIn()->getPercentPurchase();
        $paymentConstant = $pair->getIn()->getConstantPurchase();
        $exchangePercent = $pair->getOut()->getPercentPurchase();
        $exchangeConstant = $pair->getOut()->getConstantPurchase();

        $cryptocurrencyTmp = ($count + $exchangeConstant) / (1 - $exchangePercent / 100);
        $currencyTmp = $course * $cryptocurrencyTmp;

        $result = ($currencyTmp + $paymentConstant) / (1 - $paymentPercent / 100);

        return $result;
    }
}