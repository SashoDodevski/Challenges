<?php

class MarketStall
{

    public $products;

    public function __construct($products = [])
    {
        $this->setProducts($products);
    }

    public function setProducts($products)
    {
        foreach ($products as $product) {
            foreach ($product as $key => $value) {
                if (is_string($key)) {
                    return TRUE;
                } else {
                    echo  "This is not a proper input!";
                    die;
                }
            }
        }
        $this->products = $products;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function addProductToMarket(Product $item)
    {
        $key = $item->getName();
        $nextProduct = [$key => $item];
        $newProducts = array_merge($this->getProducts(), $nextProduct);
        $this->products = $newProducts;
        return $newProducts;
    }

    public function getItem($item, $amount)
    {
        if (array_key_exists($item, $this->getProducts())) {
            foreach ($this->getProducts() as $key => $product) {
                if ($item == $key) {
                    $newItem = $product;
                    return (['item' => $newItem, 'amount' => $amount]);
                } 
            }
        } else {
            return "FALSE";
        }
    }

}
