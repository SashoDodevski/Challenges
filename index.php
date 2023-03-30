<?php

require_once 'Furniture.php';
require_once 'Sofa.php';
require_once 'Bench.php';
require_once 'Chair.php';

// Part 1

echo "Part 1 <br/><br/>";

$furniture1 = new Furniture(100, 15, 50);

echo $furniture1->area();
echo "<br/>";

echo $furniture1->volume();
echo "<br/><hr/><br/>";

// Part 2

echo "Part 2 <br/><br/>";

$sofa1 = new Sofa(1200, 100, 70);
$sofa1->setArmrests(2);
$sofa1->setSeats(3);
$sofa1->setLength_opened(200);

echo $sofa1->area();
echo "<br/>";

echo $sofa1->volume();
echo "<br/><br/>";

$sofa1->setIs_for_seating(1);
echo $sofa1->area_opened();
echo "<br/><br/>";

$sofa1->setIs_for_sleeping(1);
echo $sofa1->area_opened();
echo "<br/>";

echo "<br/><hr/><br/>";

// Part 3

echo "Part 3 <br/><br/>";

$bench1 = new Bench(100, 15, 50);
$bench1->setIs_for_seating(1);
$bench1->print();
echo "<br/>";
$bench1->sneakpeek();
echo "<br/>";
$bench1->fullinfo();
echo "<br/>";

$chair1 = new Chair(75, 25, 52);
$chair1->setIs_for_seating(1);
$chair1->print();
echo "<br/>";
$chair1->sneakpeek();
echo "<br/>";
$chair1->fullinfo();
echo "<br/>";

echo "<br/><hr/><br/>";


$sofa2 = new Sofa(1000, 900, 75);
$sofa2->setArmrests(2);
$sofa2->setSeats(3);
$sofa2->setLength_opened(200);
$sofa2->setIs_for_sleeping(1);


?>

<!-- in HTML -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture</title>
</head>
<body>

<h1>Furniture</h1>

<h2><?php $sofa2->sneakpeek() ?></h2>
<p><?php $sofa2->print() ?></p>
<p><?php $sofa2->fullinfo() ?></p>

<h2><?php $bench1->sneakpeek() ?></h2>
<p><?php $bench1->print() ?></p>
<p><?php $bench1->fullinfo() ?></p>

<h2><?php $chair1->sneakpeek() ?></h2>
<p><?php $chair1->print() ?></p>
<p><?php $chair1->fullinfo() ?></p>
    
</body>
</html>