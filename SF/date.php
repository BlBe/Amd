<?php
$year = (String) $year;
if($month < 10){
    $month = "0$month";
}
$month = (String) $month;
if($month == "2"){
    $day = mt_rand(1,28);
    if($day < 10){
        $day = "0$day";
    }
}else{
    $day = mt_rand(1,30);
    if($day < 10){
        $day = "0$day";
    }
}
$day = (String) $day;