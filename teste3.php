<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    
    $sql = "SELECT id,nome
            FROM usuarios 
            WHERE 1 = 1";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql .= " AND id = {$id}";
    }
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