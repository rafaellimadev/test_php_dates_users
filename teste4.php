<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    $p = 0;
    if(isset($_GET['p'])){
        $p = $_GET['p'];
        if(!is_numeric($p) || $p <= 0) 
            throw new Exception("Paginação inválida");
        $p -= 1;
    }
    $qtdItems = 5;
    $start = $p * $qtdItems;
    
    $sql = "SELECT id,nome 
            FROM usuarios 
            WHERE 1 = 1 
            LIMIT {$start},{$qtdItems}";
    $results = $conn->query($sql)->fetchAll();

    if(count($results) <= 0) throw new Exception("Nenhum resultado encontrado");
        
    foreach ($results as $user) {
        echo nl2br("Id:".$user['id']." | Nome: ".$user['nome']."\n");
    }
} catch(PDOException $e) {
    echo 'Erro de conexão: ' . $e->getMessage();
}catch(Exception $e) {
    echo $e->getMessage();
}
?>