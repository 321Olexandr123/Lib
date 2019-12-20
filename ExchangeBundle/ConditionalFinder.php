<?php


namespace ExchangeBundle\ExchangeBundle;


use ExchangeBundle\Utils\PaymentConditionInterface;

class ConditionalFinder
{
    /**
     * @param array $conditional
     * @param $count
     * @return PaymentConditionInterface
     */
    static public function find(array $conditional, $count){
        $array_map = null;
        foreach ($conditional as $key => $paymentCondition) {
            $array_map =  self::comparator($conditional[$key], $count);
            if ($array_map !== null)
                return $array_map;
        }
        return null;
    }

    /**
     * @param PaymentConditionInterface $paymentCondition
     * @param $count
     * @return PaymentConditionInterface | null
     */
    static private function comparator($paymentCondition, float $count): ?PaymentConditionInterface
    {
        return  ( $paymentCondition->getLeftBound() <= $count && $count < $paymentCondition->getRightBound() ) ? $paymentCondition: null;
    }
}