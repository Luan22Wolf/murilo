<?php
     try {
        $host="localhost";
        $user="root";
        $pass="root";
        $port="3306";
        $db="zorp3r";

    $con = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexão realizada com sucesso <br><br>";


} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
    
}
?>