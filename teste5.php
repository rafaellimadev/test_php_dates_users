<?php
include 'MyDate.php';
try {
    if(!isset($_GET['date']))
        throw new Exception("Você deve informar uma data no formato dd/mm/yyy no parâmetro 'date' para conversão");
    echo MyDate::toAmerican($_GET['date']);      
} catch (\Exception $e) {
    echo $e->getMessage();
}

?>