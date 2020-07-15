# Laravel Arabic Tafqeet  تفقيط الأرقام باللغة العربية

[![License](https://poser.pugx.org/alkoumi/laravel-arabic-tafqeet/license)](https://packagist.org/packages/alkoumi/laravel-arabic-tafqeet)
[![Latest Stable Version](https://poser.pugx.org/alkoumi/laravel-arabic-tafqeet/v/stable)](https://packagist.org/packages/alkoumi/laravel-arabic-tafqeet)
[![Total Downloads](https://poser.pugx.org/alkoumi/laravel-arabic-tafqeet/downloads)](https://packagist.org/packages/alkoumi/laravel-arabic-tafqeet)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/alkoumi/laravel-arabic-tafqeet/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/alkoumi/laravel-arabic-tafqeet/?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/alkoumi/laravel-arabic-tafqeet/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)

Laravel package to translate money numbers to our Amazing 💝 Arabic language TAFQEET . to look like [فقط تسعمائة ألف ريال و أربعة و ثلاثون هللة لاغير]
## Installation to All Laravel Versions 🥳

You can install the package via composer:

	composer require alkoumi/laravel-arabic-tafqeet

The service provider will automatically get registered. Or you may manually add the service provider in your `config/app.php` file:

    'providers' => [
        // ...
        Alkoumi\LaravelArabicTafqeet\LaravelArabicTafqeetServiceProvider::class,
    ];

## Usage
![Tafqeet](imags/tafqeet.png)

Simply pass amount as `Number` to the method `Tafqeet::inArabic($amount,'usd')` 

the default currency is SAR you can change it by pass the currency with the $amount `Tafqeet::inArabic($amount,'usd')`
 
supporing most of arabic currencies same => `sar` , `egp` , `kwd` extra... 


```php

        use Alkoumi\LaravelArabicTafqeet\Tafqeet;


        // Default currency is sar
	$amount = App\cheque::first()->money;
	$tafqeetInArabic = Tafqeet::inArabic($amount);
        // Result => "فقط تسعمائة ألف ريال و أربعة و ثلاثون هللة لاغير"
```

```php
        use Alkoumi\LaravelArabicTafqeet\Tafqeet;


        // change currency 
	$amount = App\cheque::first()->money;
	$tafqeetInArabic = Tafqeet::inArabic($amount,'egp');
        // Result => "فقط تسعمائة ألف جنيه و أربعة و ثلاثون قرش لاغير"
```