<?php
$fgc1 = file_get_contents("http://www.mocky.io/v2/5d47f235330000623fa3ebf7");
$json1 = json_decode($fgc1, true);
foreach($json1 as $key => $value){
    $isGorevi = $value['isGörevi'];
    $level = $value['level'];
    $tahminiSure = $value['tahminiSure'];

    echo $isGorevi."<br/>";
    echo $level."<br/>";
    echo $tahminiSure."<br/>";
    echo "<hr/>";
    }
