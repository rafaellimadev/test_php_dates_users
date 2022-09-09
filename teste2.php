<?php
try {
    if(!isset($_GET['date'])) 
        throw new Exception("Data não informada");
    
    if(!$date_en = DateTime::createFromFormat('d/m/Y', $_GET['date']))
        throw new Exception("Data inválida");
    
    echo date_diff($date_en, date_create(date("Y-m-d")))->format('%a dias');
} catch (\Exception $e) {
    echo $e->getMessage();
}
?>