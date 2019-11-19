##Exchange library for different currency

**Exchange-itlab** friendly Symfony library to exchange everything

You can download it from [`packagist.org`](https://packagist.org/packages/exchange/exchange#dev-master)

## Requirements:

- Php `>=7.1.0`.
- ext-json.
- Twig `>=1.5` version is required if you use twig templating engine.
- doctrine/collections `^1.6` for support collection and orm entity

## Pretty simple with [Composer](http://packagist.org), run

```sh
1. composer config --global --auth http-basic.repo.packagist.com igor-itlab 825866aa17573d24b9cd498e1ea534ad363873a92ae8e44a6ee877f435cb
2. composer config repositories.private-packagist composer https://repo.packagist.com/it-lab-studio/
3. composer config repositories.packagist.org false
4. composer require exchange/exchange
```

## Add ExchangeBundle to your application kernel

```php
// .../config/bundles.php
return [
    // ...
    ExchangeBundle\ExchangeBundle::class => ['all' => true],
    // ...
];
```

## Get started
You can implement you **Exchange Entity** with **ExchangeObjectInterface.php**

```php
// ..../Currency.php
/**
 * @ORM\Entity(repositoryClass=" ...\Repository\CurrencyRepository")
 */
class Currency implement ExchangeObjectInterface
{
    // ....
    function getAbbreviation();

    public function getCourse(): float;

    public function getSelling(): float;

    public function getPurchase(): float;

    public function getPayment(): PaymentSystemInterface;
        
    // ....
}
```

In order to create an exchange pair, you must use **ExchangePairBuilder**

```php
// ..../MyController.php
public function index()
{
    pairBuilder = new ExchangePairBuilder();
}
```

also you can save your object in **Entity**

```php
// ..../Currency.php
/**
 * @ORM\Entity(repositoryClass=" ...\Repository\PairRepository")
 */
class Pair extends AbstractExchangePair
{
    // ....
       
    public function setIn(ExchangeObjectInterface $exchangeObject);

    public function setOut(ExchangeObjectInterface $exchangeObject);

    public function setCourse(float $course);

    public function getIn(): ExchangeObjectInterface;

    public function getOut(): ExchangeObjectInterface;

    public function getCourse(): float;
        
    // ....
}
```

## Build pair example

```php
// ..../MyController.php
public function index()
{
    // ....
    pairBuilder
        ->in(ExchangeObjectInterface $object)
        ->out(ExchangeObjectInterface $object)
        ->build(): \stdClass
    // ....
}
```

This builder return **stdClass** class object. You can use this to create your **Entity** object

```php
// ..../MyController.php
public function index()
{
    // ....
    pair = new Pair();
    pair = ExchangePairCreator::build(pair,pairBuilder->build());
    // ....
}
```

## Calculation render
Extend your **Calculation** class and _override_ **change** behavior and use it in Controller when you want
```php
..../Сalculation.php

class Calculation extend AbstractCalculation
{
    ....
    abstract public function onChangeIn(): float
    {

    }
    
    abstract public function onChangeOut(): float
    {

    }        
    ....
}
```

In twig use extension

- exchange `{{ exchange(pair) }}`.
- exchange_in `{{ exchange_in(currency) }}`.
- exchange_out `{{ exchange_in(crypto-currency) }}`.


exchange:
```twig
<div class="calculation calculation-input" id="calculation_in">
    <label class="calculation-signature" for="in">{{ pair.getIn.abbreviation }}{{ pair.getIn.payment.signature }}</label>
    <input id="in" type="text">
</div>

<div class="calculation calculation-input" id="calculation_out">
    <label class="calculation-signature" for="out">{{ pair.getOut.abbreviation }}{{ pair.getOut.payment.signature }}</label>
    <input id="out" type="text">
</div>
```

exchange_in or exchange_out:
```twig
<div class="calculation calculation-input" id="calculation_object">
    <label class="calculation-signature" for="object">{{ object.abbreviation }}{{ object.payment.signature }}</label>
    <input id="object" type="text">
</div>
```