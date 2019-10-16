<?php
namespace Exchange\Utils;

interface ExchangeObjectInterface
{
    function abbreviation();

    public function course();

    public function selling();

    public function purchase();
}