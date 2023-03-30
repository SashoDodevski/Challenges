<?php

class Product
{
    protected $name;
    protected int $price;
    protected bool $sellingByKg;

    public function __construct($name, $price, $sellingByKg)
    {
        $this->name = $name;
        $this->price = $price;
        $this->sellingByKg = $sellingByKg;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getSellingByKg(){
        if($this->sellingByKg == TRUE) {
            return "kg";
        } else {
            return "gunny sacks";
        }
    }
 
}