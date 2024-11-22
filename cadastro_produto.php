<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade_estoque = $_POST['quantidade_estoque'];


    $stmt = $pdo->prepare("INSERT INTO produtos (nome, descricao, preco, quantidade_estoque) VALUES (:nome, :descricao, :preco, :quantidade_estoque)");
    $stmt->execute([
        'nome' => $nome,
        'descricao' => $descricao,
        'preco' => $preco,
        'quantidade_estoque' => $quantidade_estoque
    ]);

    echo "Produto cadastrado com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
</head>
<body>
    <h2>Cadastrar Novo Produto</h2>
    <form method="POST">
        <label for="nome">Nome do Produto:</label>
        <input type="text" name="nome" required>
        <br>
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" required></textarea>
        <br>
        <label for="preco">Preço:</label>
        <input type="number" step="0.01" name="preco" required>
        <br>
        <label for="quantidade_estoque">Quantidade em Estoque:</label>
        <input type="number" name="quantidade_estoque" required>
        <br>
        <button type="submit">Cadastrar Produto</button>
    </form>
</body>
</html>