<?php

    // Extended verzija na prvata zadaca

    echo date('H:m:s');
    
    echo "<br/>";

    $name = "Kathrin";
    
    $currentTime = date('H:m:s');

    $morningTime = "12:00:00";

    $afternoonTime = "19:00:00";

    if ($name == "Kathrin") {    if ($currentTime < $morningTime) {
        echo "Good morning Kathrin.";
    } else if (($currentTime > $morningTime) && ($currentTime < $afternoonTime)){
        echo "Good afternoon Kathrin.";
    } else {
        echo "Good evening Kathrin."; 
    }
    } else {
        echo "Nice name.";
    }

    echo "<br/>";
    echo "<hr>";


    // Samo kako posebna zadaca

    echo date('H:m:s');
    
    echo "<br/>";

    $currentTime = date('H:m:s');

    $morningTime = "12:00:00";

    $afternoonTime = "19:00:00";

    if ($currentTime < $morningTime) {
        echo "Good morning Kathrin.";
    } else if (($currentTime > $morningTime) && ($currentTime < $afternoonTime)){
        echo "Good afternoon Kathrin.";
    } else {
        echo "Good evening Kathrin."; 
    }

    echo "<br/>";
    echo "<hr>";
    echo "<br/>";



    //Rating

    $rating = 7;

    $rated = True;

    if (($rating >= 1) && ($rating <= 10) && (is_int($rating) == True)) {
        if ($rated == True) {
            echo "You already voted.";
        } else {
            echo "Thanks for voting.";
        }
    } else {
        echo "Invalid rating, only numbers between 1 and 10.";
    }   

    echo "<br/>";
    echo "<br/>";

    if (is_int($rating) != True) {
        echo "Rating is not a integer.";
    } 

    echo "<hr>";
    echo "<br/>";
    
?>