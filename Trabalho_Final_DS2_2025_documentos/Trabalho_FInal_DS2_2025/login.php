<?php
session_start();
require_once 'conexao.php';

$erro = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM Funcionarios WHERE email = :email");
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario'] = $usuario['nome'];
        $_SESSION['id_funcionario'] = $usuario['id_funcionario'];
        header("Location: painel.php");
        exit;
    } else {
        $erro = "Email ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - GestorFlex</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-box">
    <img src="logo.svg" alt="Logo" class="logo">
    <h2>GestorFlex</h2>
    <form method="post">
        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Senha:</label>
        <input type="password" name="senha" required>

        <button type="submit">Entrar</button>
        <p><a href="cadastro.php">Ainda não tem cadastro?<br>Cadastre-se aqui!</a></p>
        <p style="color:red;"><?= $erro ?></p>
    </form>
</div>
</body>
</html>
