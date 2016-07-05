<?php
    $add = str_split($add);
    list($a1,$a2,$a3,$a4,$a5,$a6) = $add;
    $add = $a1.$a2.$a3.$a4.$a5.$a6;
    $year = str_split($year);
    list($y1,$y2,$y3,$y4) = $year;
    $year = $y1.$y2.$y3.$y4;
    $month = str_split($month);
    list($m1,$m2) = $month;
    $month = $m1.$m2;
    $day = str_split($day);
    list($d1,$d2) = $day;
    $day = $d1.$d2;
    $ran = (String) $ran;
    $ran = str_split($ran);
    list($r1,$r2,$r3) = $ran;
    $ran = $r1.$r2.$r3;
    $check = ( $a1 * 7 + $a2 * 9 + $a3 * 10 + $a4 * 5 + $a5 * 8 + $a6 * 4 );
    $check = $check + ( $y1 * 2 + $y2 * 1 + $y3 * 6 + $y4 * 3 );
    $check = $check + ( $m1 * 7 + $m2 * 9 + $d1 * 10 + $d2 * 5 );
    $check = $check + ( $r1 * 8 + $r2 * 4 + $r3 * 2 );
    $check = $check % 11;
    switch($check){
        case 0:
        $check = 1;
        break;
        case 1:
        $check = 0;
        break;
        case 2:
        $check = "X";
        break;
        case 3:
        $check = 9;
        break;
        case 4:
        $check = 8;
        break;
        case 5:
        $check = 7;
        break;
        case 6:
        $check = 6;
        break;
        case 7:
        $check = 5;
        break;
        case 8:
        $check = 4;
        break;
        case 9:
        $check = 3;
        break;
        case 10:
        $check = 2;
        break;
    }