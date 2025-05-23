<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel - GestorFlex</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="painel-bg">
    <div class="painel-container">
        <h1>Bem-vindo, <?= $_SESSION['usuario'] ?>!</h1>
        <p>Selecione uma opção para continuar:</p>
        <div class="painel-botoes">
            <a href="cadastro.php" class="btn">Cadastrar Funcionário</a>
            <a href="folha_pagamento.php" class="btn">Folha de Pagamento</a>
            <a href="cargos.php" class="btn">Gerenciar Cargos</a>
            <a href="logout.php" class="btn logout">Sair</a>
        </div>
    </div>
</body>
</html>
