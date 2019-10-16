<?php


use Exchange\State\State;
use Exchange\Utils\ExchangeObjectInterface;

class Selling extends State
{

    /**
     * @param ExchangeObjectInterface|null $in
     * @param ExchangeObjectInterface|null $out
     * @param $multiplicity
     * @return mixed
     */
    public function handle(ExchangeObjectInterface $in = null, ExchangeObjectInterface $out = null, $multiplicity = 1)
    {
        if (isset($in, $out)){
            return $multiplicity * ($multiplicity * $in->selling()) / ($multiplicity*$out->selling());
        } else {
            return null;
        }
    }
}