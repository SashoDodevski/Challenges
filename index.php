<?php

require_once __DIR__ . '/classes/Product.php';
require_once __DIR__ . '/classes/MarketStall.php';
require_once __DIR__ . '/classes/Cart.php';

$orange = new Product('orange', 35, true);
$potato = new Product('potato', 240, false);
$nuts = new Product('nuts', 850, false);
$kiwi = new Product('kiwi', 670, false);
$pepper = new Product('pepper', 330, true);
$raspberry = new Product('raspberry', 555, false);

$marketStall1 = new MarketStall(['orange' => $orange,'kiwi' => $kiwi]);
$marketStall1->addProductToMarket($nuts);
$marketStall1->addProductToMarket($pepper);
$marketStall1->addProductToMarket($raspberry);
print_r($marketStall1);

echo '<hr/>';
echo '<hr/>';


print_r($marketStall1->getItem('orange', 4));
echo '<br/>';
print_r($marketStall1->getItem('kiwi', 3));
echo '<br/>';
print_r($marketStall1->getItem('pepper',3));

echo '<hr/>';
echo '<hr/>';


$cart = new Cart();

print_r($cart->addToCart( $marketStall1, 'orange', 3 ));
echo '<br/>';
echo '<br/>';
print_r($cart->addToCart( $marketStall1, 'nuts', 2 ));
print_r($cart->addToCart( $marketStall1, 'raspberry', 5 ));
echo '<br/>';
echo '<br/>';
print_r($cart->getCartItems());
echo '<br/>';
echo '<br/>';

echo '<hr/>';
echo '<hr/>';
echo '<hr/>';

$cart->printReceipt();
echo '<br/>';
echo '<br/>';

