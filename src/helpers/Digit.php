<?php


namespace Alkoumi\LaravelArabicTafqeet\Helpers;


trait Digit
{

    protected $others = [
        2 => 'اثنا',
        1 => 'احد',
        4 => 'اربع'
    ];


    protected $ones = [
        0 => "صفر",
        1 => "واحد",
        2 => "اثنان",
        3 => "ثلاثة",
        4 => "أربعة",
        5 => "خمسة",
        6 => "ستة",
        7 => "سبعة",
        8 => "ثمانية",
        9 => "تسعة",
        10 => "عشرة",
        11 => "أحد عشر",
        12 => "اثنى عشر"
    ];

    protected $tens = [
        1=> "عشر",
        2=> "عشرون",
        3=> "ثلاثون",
        4=> "أربعون",
        5=> "خمسون",
        6=> "ستون",
        7=> "سبعون",
        8=> "ثمانون",
        9=> "تسعون"
    ];


    protected $hundreds = [
        0=> "صفر",
        1=> "مائة",
        2=> "مئتان",
        3=> "ثلاثمائة",
        4=> "أربعمائة",
        5=> "خمسمائة",
        6=> "ستمائة",
        7=> "سبعمائة",
        8=> "ثمانمائة",
        9=> "تسعمائة"
    ];


    protected $thousands = [
        1=> "ألف",
        2=> "ألفان",
        39=> "آلاف",
        1199=> "ألفًا"
    ];


    protected $millions = [
        1=> "مليون",
        2=> "مليونان",
        39=> "ملايين",
        1199=> "مليونًا"
    ];



    protected $billions = [
        1=> "مليار",
        2=> "ملياران",
        39=> "مليارات",
        1199=> "مليارًا"
    ];


    protected $trillions = [
        1=> "تريليون",
        2=> "تريليونان",
        39=> "تريليونات",
        1199=> "تريليونًا"
    ];




}





//
//    protected  function  getNameOfHala($number)
//    {
//        $number = $number * 1;
//        if($number==0)
//        {
//            return '';
//        }
//
//
//        if ($number<=2)
//        {
//            return $this->single_after_comma;
//        }
//
//
//        if($number>=9)
//            return $this->single_after_comma;
//
//
//
//        return $this->multi_after_comma;
//    }
