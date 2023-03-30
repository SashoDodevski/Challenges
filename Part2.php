<?php

// binary number to a decimal number

$binary = '10011';

echo bindec($binary);
echo '<hr/>';

function binaryToDecimalArray($numbers){
    foreach($numbers as $key => $number) {
        echo $number . ' = ' . bindec($number) . '<br ?>';
    }
}   

$binaryArray = ['10001', '101101', '11111', '10111111001', '11101', '1110001', '01011011101', '000101', '1101101', '101101001'];

binaryToDecimalArray($binaryArray);

echo '<hr/>';


//roman number to a decimal number

function romanToDecimal($roman){
    $catalog = [
        array("letter" => 'I', "number" => 1),
        array("letter" => 'V', "number" => 5),
        array("letter" => 'X', "number" => 10),
        array("letter" => 'L', "number" => 50),
        array("letter" => 'C', "number" => 100),
        array("letter" => 'D', "number" => 500),
        array("letter" => 'M', "number" => 1000),
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


echo '<hr/>';


function romanToDecimalArray ($romans) {
        
    foreach ($romans as $roman) {
        echo $roman . ' = ' . romanToDecimal($roman) . '<br ?>';
    }
}

$array = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X'];

romanToDecimalArray ($array);

echo '<hr/>';

?>