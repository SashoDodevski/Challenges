<?php

    $currentTime = date('H:m:s');
    $morningTime = "12:00:00";
    $afternoonTime = "19:00:00";

    $voters = [
        'Marija' => [False, 5],
        'Nikola' => [True, 8],
        'Angela' => [False, 90],
        'Elena' => [False, 10],
        'Aleksandar' => [False, 6],
        'Maja' => [True, 3],
        'Bojan' => [False, 7],
        'Natasha' => [False, 1],
        'Ana' => [False, 0],
        'Toshe' => [False, 9]

    ];



    foreach ($voters as $key => $value) {
        if ($currentTime < $morningTime) {
            echo "Good morning $key.";
            echo "<br/>";
            if (($value[1] >= 1) && ($value[1] <= 10) && (is_int($value[1]) == True)) {
                if ($value[0] == True) {
                    echo "You already voted.";
                    echo "<br/>";
                    echo "<hr>";
                } else {
                    echo "Thanks for voting with $value[1].";
                    echo "<br/>";
                    echo "<hr>";
                }
            } else {
                echo "Invalid rating, only integer numbers between 1 and 10.";
                echo "<br/>";
                echo "<hr>";;
            } 
            
        } else if (($currentTime > $morningTime) && ($currentTime < $afternoonTime)){
            echo "Good afternoon $key.";
            echo "<br/>";
            if (($value[1] >= 1) && ($value[1] <= 10) && (is_int($value[1]) == True)) {
                if ($value[0] == True) {
                    echo "You already voted.";
                    echo "<br/>";
                    echo "<hr>";
                } else {
                    echo "Thanks for voting with $value[1].";
                    echo "<br/>";
                    echo "<hr>";
                }
            } else {
                echo "Invalid rating, only integer numbers between 1 and 10.";
                echo "<br/>";
                echo "<hr>";;
            }   
        
        } else {
            echo "Good evening $key."; 
            echo "<br/>";
            if (($value[1] >= 1) && ($value[1] <= 10) && (is_int($value[1]) == True)) {
                if ($value[0] == True) {
                    echo "You already voted.";
                    echo "<br/>";
                    echo "<hr>";
                } else {
                    echo "Thanks for voting with $value[1].";
                    echo "<br/>";
                    echo "<hr>";
                }
            } else {
                echo "Invalid rating, only integer numbers between 1 and 10.";
                echo "<br/>";
                echo "<hr>";;
            }
        }
    };


?>