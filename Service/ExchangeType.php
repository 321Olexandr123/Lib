<?php


namespace ExchangeBundle\Service;


use ExchangeBundle\Exchange\Purchase;
use ExchangeBundle\Exchange\Selling;

class ExchangeType
{
    public static function getType(): \stdClass
    {
        $list = new \stdClass();

        $list->Selling = new Selling();
        $list->Purchase = new Purchase();

        return $list;
    }
}