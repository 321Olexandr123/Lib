<?php

namespace ExchangeBundle;

use ExchangeBundle\DependencyInjection\ExchangeExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ExchangeBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new ExchangeExtension();
    }
}