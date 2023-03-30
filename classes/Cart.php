<?php

require_once __DIR__ . '/Product.php';
require_once __DIR__ . '/MarketStall.php';

class Cart extends MarketStall
{

    private $cartItems = [];
    private $finalPrice = [];

    public function getCartItems(){
        return $this->cartItems;
    }

    public function getFinalPrice(){
        return $this->finalPrice;
    }

    public function addToCart($marketStall, $item, $amount)
    {  
        if (array_key_exists($item, $marketStall->getProducts())) {
            foreach ($marketStall->getProducts() as $key => $product) {
                if ($item == $key) {
                    $newItem = $product;
                    $totalPerProduct = $amount * $newItem->getPrice();
                    $newAmount = implode(" ",[$amount, $newItem->getSellingByKg()]);
                    $nextItem = [$newItem->getName(), " | ", $newAmount , " | ", "total = " . $totalPerProduct . " denars"];
                    $cartItem = implode(" ", $nextItem);
                    array_push($this->cartItems, $cartItem);
                    array_push($this->finalPrice, $totalPerProduct);
                }
            }
        } else {
            return FALSE;
        }
        return $this->cartItems;
    }


    public function printReceipt()
    {
        if (!empty($this->cartItems)) {

            foreach($this->getCartItems() as $productItem){
                echo $productItem . "<br/>";
            };
            echo "<br/>";
            echo "Final price amount: " . array_sum($this->getFinalPrice()) . " denars.";

        } else {
            echo "Your cart is empty";
        }
    }
}
