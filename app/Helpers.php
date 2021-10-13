<?php

function getPrice($price){
    $price = floatval($price/100);
    return number_format($price,2,'.', ' '). ' €';
}