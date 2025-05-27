<?php

include ('protect.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel - GestorFlex</title>
    <link rel="stylesheet" href="painel.css">
</head>
<body>
    <div class="painel-container">
        <h1>Bem-vindo, <?= $_SESSION['nome'] ?>!</h1>
        <p class="p1">Selecione uma opção para continuar:</p>
        <div>
            <a href="cadastro.php" class="botao">Cadastrar Funcionário</a>
            <a href="folha_pagamento.php" class="botao">Folha de Pagamento</a>
            <a href="cargos.php" class="botao">Gerenciar Cargos</a>
            <a href="logout.php" class="logout">Sair</a>
        </div>
    </div>
</body>
</html>
