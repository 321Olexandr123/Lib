<?php


use Exchange\DependencyInjection\ExchangeExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ExchangeBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new ExchangeExtension();
    }
}