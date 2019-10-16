<?php
namespace Exchange\Utils;

interface ExchangeObject
{
    function abbreviation();

    public function course();

    public function selling();

    public function purchase();
}