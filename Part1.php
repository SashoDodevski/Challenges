<?php

//decimal to a binary number

$num = 3;

echo decbin($num);
echo '<hr/>';

function decimalToBinary($numbers){
    foreach($numbers as $key => $number) {
        echo $number . ' = ' . decbin($number) . '<br ?>';
    }
}   

$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

decimalToBinary($array);

echo '<hr/>';


//decimal to roman number

function decimalToRomanNumber($number)
{  if ($number > 3999) {
    echo 'Error: Can not convert number, number is greater than 3999.';
} else {
 $number = intval($number);
 $result = '';
 
 $catalog = [
 'M' => 1000,
 'CM' => 900,
 'D' => 500,
 'CD' => 400,
 'C' => 100,
 'XC' => 90,
 'L' => 50,
 'XL' => 40,
 'X' => 10,
 'IX' => 9,
 'V' => 5,
 'IV' => 4,
 'I' => 1];
 
 foreach($catalog as $roman => $value){

  $matches = intval($number/$value);
  $result .= str_repeat($roman,$matches);
  $number = $number % $value;
 }
 
 return $result;
}
}

echo decimalToRomanNumber(694). '<br ?>';
echo decimalToRomanNumber(4000).'<br ?>';

echo '<hr/>';


function decimalToRomanArray ($numbers) {
        
    foreach ($numbers as $number) {
        if ($number > 3999) {
            echo 'Error: Can not convert number, number is greater than 3999.';
        } else {
        echo $number . ' = ' . decimalToRomanNumber($number) . '<br ?>';
    }
    }
}

$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

decimalToRomanArray ($array);

echo '<hr/>';

?>