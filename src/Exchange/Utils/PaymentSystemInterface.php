<?php


namespace Exchange\Utils;


interface PaymentSystemInterface
{
    /**
     * @return string
     */
    public function signature(): string;
    /**
     * @return string
     */
    public function name(): string;

    /**
     * @return float
     */
    public function min(): float;

    /**
     * @return float
     */
    public function max(): float;

    /**
     * @return float
     */
    public function percent(): float;

    /**
     * @return float
     */
    public function constant(): float;
}