<?php

//decimal to a binary number

$num = 3;
echo decbin($num);
echo '<br/>';

//decimal to roman number

function decimalToRomanNumber($number)
{  if ($number > 3999999) {
    echo 'Error: Can not convert to roman, number is greater than 3999.';
} else {
 $number = intval($number);
 $result = '';
 
 $catalog = [
 ' ̅M' => 1000000,
 ' ̅C ̅M' => 900000,
 ' ̅D' => 500000,
 ' ̅C ̅D' => 400000,
 ' ̅C' => 100000,
 ' ̅X ̅C' => 90000,
 ' ̅L' => 50000,
 ' ̅X ̅L' => 40000,
 ' ̅X' => 10000,
 'M ̅X' => 9000,
 ' ̅V' => 5000,
 'M ̅V' => 4000,
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

// binary to decimal number

$binary = '10011';

echo bindec($binary);
echo '<br/>';

//roman to decimal number

function romanToDecimal($roman){
    $catalog = [
        array("letter" => 'I', "number" => 1),
        array("letter" => 'V', "number" => 5),
        array("letter" => 'X', "number" => 10),
        array("letter" => 'L', "number" => 50),
        array("letter" => 'C', "number" => 100),
        array("letter" => 'D', "number" => 500),
        array("letter" => 'M', "number" => 1000),
        array("letter" => ' ̅V', "number" => 5000),
        array("letter" => ' ̅X', "number" => 10000),
        array("letter" => ' ̅L', "number" => 50000),
        array("letter" => ' ̅C', "number" => 100000),
        array("letter" => ' ̅D', "number" => 500000),
        array("letter" => ' ̅M', "number" => 1000000),
        array("letter" => 0, "number" => 0)
    ];
    $decimal = 0;
    $state = 0;
    $sidx = 0;
    $len = strlen($roman);

    while ($len >= 0) {
        $i = 0;
        $sidx = $len;

        while ($catalog[$i]['number'] > 0) {
            if (strtoupper(@$roman[$sidx]) == $catalog[$i]['letter']) {
                if ($state > $catalog[$i]['number']) {
                    $decimal -= $catalog[$i]['number'];
                } else {
                    $decimal += $catalog[$i]['number'];
                    $state = $catalog[$i]['number'];
                }
            }
            $i++;
        }

        $len--;
    }

    return($decimal);
}

echo romanToDecimal('DCXCIV');
echo '<br/>';

//binary to roman number

function binaryToRoman ($number) {
    return decimalToRomanNumber(bindec($number));
}

$number = '100101';
echo binaryToRoman ($number);
echo '<br/>';

//roman to binary number

function romanToBinary($number) {
    return decbin(romanToDecimal($number));
}

echo '<hr/>';


