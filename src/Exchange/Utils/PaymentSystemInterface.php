<?php


namespace Exchange\Utils;


interface PaymentSystemInterface
{
    public function min(): float;

    public function max(): float;

    public function percent(): float;

    public function constant(): float;
}