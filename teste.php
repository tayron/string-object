<?php
require_once('vendor/autoload.php');

use Tayron\StringObject;

try{
    echo '<pre>';
    
    $string = new StringObject('adfadsfa');
    $string->toUpper();
    
    var_dump($string->getValue());
    
    $string = new StringObject('1');
    $integer = $string->parseIntegerObject();
    
    var_dump($integer);    

}catch(Exception $e){
    echo $e->getMessage();   
}