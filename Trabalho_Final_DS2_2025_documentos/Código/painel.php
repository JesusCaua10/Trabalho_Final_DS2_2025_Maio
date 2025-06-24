<?php
include('protect.php');
include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel - GestorFlex</title>
    <link rel="stylesheet" href="painel.css">
</head>
<body>

<div class="sidebar">
    <h2>GestorFlex</h2>
    <ul>
        <li><a href="painel.php">🏠 Painel</a></li>
        <li><a href="Rfuncionarios.php">👥 Funcionários</a></li>
        <li><a href="Rcargo.php">💼 Cargos</a></li>
        <li><a href="folha_pagamento.php">📑 Folha de Pagamento</a></li>
        <li><a href="logout.php">🚪 Sair</a></li>
    </ul>
</div>

<div class="content">
    <h1>Bem-vindo, <?= $_SESSION['nome'] ?>!</h1>
    <p>Escolha uma opção no menu para gerenciar sua empresa.</p>
</div>

</body>
</html>
