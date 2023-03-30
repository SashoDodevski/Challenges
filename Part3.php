<?php

include 'subfunctionsPart3.php';

function checkNumberType ($number) {
    if (preg_match('/^[0-1]*$/m', $number)) {
        echo 'The number is binary!';
    }  elseif (preg_match('/^[+|-][0](\d*\.)?\d+$/mi', $number)) {
        echo 'Error!';
    }  elseif (preg_match('/^(\d*\.)?\d+$/mi', $number) || preg_match('/^[+|-](\d*\.)?\d+$/mi', $number)) {
        echo 'The number is decimal!';
    }  elseif (preg_match('/^(M{0,3})(C(?:D|M)|D?C{0,3})(X(?:L|C)|L?X{0,3})(I(?:V|X)|V?I{0,3})$/', $number)) {
        echo 'The number is roman!';
    }  else {
        echo 'Error: Wrong number type!';
    }
}

$number = '100100';
echo checkNumberType ($number);
echo '<br/>';

$number = '+7564';
echo checkNumberType ($number);
echo '<br/>';

$number = 'MCMXV';
echo checkNumberType ($number);
echo '<br/>';

$number = 'McV';
echo checkNumberType ($number);
echo '<br/>';

$number = '-0123';
echo checkNumberType ($number);
echo '<br/>';

echo '<hr>';


function convertNumberType ($number) {
    if (preg_match('/^[0-1]*$/m', $number)) {
        echo $number . ' = ' . bindec($number) . ' = ' . binaryToRoman ($number);
    }  elseif (preg_match('/^[+|-][0](\d*\.)?\d+$/mi', $number)) {
        echo 'Error!';
    }  elseif (preg_match('/^(\d*\.)?\d+$/mi', $number) || preg_match('/^[+|-](\d*\.)?\d+$/mi', $number)) {
        echo $number . ' = ' . decbin($number) . ' = ' . decimalToRomanNumber ($number);
    }  elseif (preg_match('/^( ̅M{0,3})( ̅C(?: ̅D| ̅M)| ̅D? ̅C{0,3})( ̅X(?: ̅L| ̅C)| ̅L? ̅X{0,3})(M(?: ̅V| ̅X)| ̅V?M{0,3})(C(?:D|M)|D?C{0,3})(X(?:L|C)|L?X{0,3})(I(?:V|X)|V?I{0,3})$/', $number)) {
        echo $number . ' = ' . romanToBinary($number) . ' = ' . romanToDecimal($number);
    }  else {
        echo 'Error: Wrong number type!';
    }
}

$number = '100100';
echo convertNumberType ($number);
echo '<br/>';

$number = '+756';
echo convertNumberType ($number);
echo '<br/>';

$number = '756';
echo convertNumberType ($number);
echo '<br/>';

$number = 'MCMXV';
echo convertNumberType ($number);
echo '<br/>';

$number = 'McV';
echo convertNumberType ($number);
echo '<br/>';

$number = '-0123';
echo convertNumberType ($number);
echo '<br/>';

echo '<hr>';

$number = '100123';
echo convertNumberType ($number);
echo '<br/>';

$number = '3999999';
echo convertNumberType ($number);
echo '<br/>';

$number =' ̅M ̅M ̅M ̅C ̅M ̅X ̅CM ̅XCMXCIX';
echo convertNumberType ($number);
echo '<br/>';

echo '<hr>';



function convertArrayOfNumbers($numbers){
    foreach($numbers as $key => $number) {
        convertNumberType ($number);
        echo '<br/>';
    }
} 

$numbers = [101, 'MCV', '10010011', '+2544', '88776', 'MCMVIII', 65487];
echo convertArrayOfNumbers($numbers);
echo '<hr>';


//recursive

function romanCountdown($number) {
    if($number == 0) {
        return;
        }
        echo decimalToRomanNumber($number);
        echo '<br/>';
        romanCountdown($number-1);
 
   }    

$number = 10;
echo romanCountdown($number);
echo '<hr>';

?>