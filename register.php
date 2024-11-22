<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); 
    $tipo_usuario = $_POST['tipo_usuario'];

    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, tipo_usuario) VALUES (:nome, :email, :senha, :tipo_usuario)");
    $stmt->execute([
        'nome' => $nome,
        'email' => $email,
        'senha' => $senha,
        'tipo_usuario' => $tipo_usuario
    ]);

    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registro - Zorp</title>
</head>
<body>
    <h2>Cadastrar Novo Usuário</h2>
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <br>
        <label for="email">E-mail:</label>
        <input type="email" name="email" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required>
        <br>
        <label for="tipo_usuario">Tipo de Usuário:</label>
        <select name="tipo_usuario" required>
            <option value="admin">Administrador</option>
            <option value="vendedor">Vendedor</option>
            <option value="comprador">Comprador</option>
            <option value="rh">RH</option>
            <option value="estoque">Estoque</option>
        </select>
        <br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>