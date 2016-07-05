<?php
if($year == null) {
    echo "*年份没有输入，请重新输入";
    exit();
}
if ($year <= 1900) {
    echo "*年份输入有误，请输入大于1900年的整数";
    exit();
}
if($year > date("Y")){
    echo "*还没出世呢，请输入小于".date("Y")."年的整数";
    exit();
}
if($month == null){
    echo "*月份没有输入，请重新输入";
    exit();
}
if($month < 0 || $month > 12){
    echo "*月份只有1-12月，请输入1-12的整数";
    exit();
}
if($day == null){
    echo "*日期没有输入，请重新输入";
    exit();
}
if($day < 1){
    echo "*请输入大于0的日期整数";
    exit();
}
if($year % 400 == 0 || $year % 4 == 0){
    if($month == 2){
        if($day > 29){
            echo "*此年份2月只有29号";
            exit();
        }
    }
}else{
    if($month == 2){
        if($day > 28){
            echo "*此年份2月只有28号";
            exit();
        }
    }
}
$dy = array(1,3,5,7,8,10,12);
$xy = array(4,6,9,11);
if(in_array($month,$dy)){
    if($day > 31){
        echo "*".$month."月只有31号";
        exit();
    }
}elseif(in_array($month,$xy)){
    if($day > 30){
        echo "*".$month."月只有30号";
        exit();
    }
}
if($six == null){
    echo "*请选择性别";
    exit();
}
$year = (String) $year;
if($month < 10){
    $month = "0".$month;
}
$month = (String) $month;
if($day < 10){
    $day = "0".$day;
}
$day = (String) $day;
