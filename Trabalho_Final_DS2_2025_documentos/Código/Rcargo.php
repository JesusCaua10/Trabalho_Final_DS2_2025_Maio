<?php
include('conexao.php');
include('protect.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Cargos - GestorFlex</title>
    <link rel="stylesheet" href="Rcargo.css">
</head>
<body>
    <div class="painel-container">
        <h1>Lista de Cargos</h1>
        
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nome do Cargo</th>
                <th>Salário Base</th>
                <th>Ações</th>
            </tr>
            <?php
            $stmt = $pdo->prepare("SELECT * FROM cargo");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id_cargo']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nome_cargo']) . "</td>";
                echo "<td>R$ " . number_format($row['salario_base'], 2, ',', '.') . "</td>";
                echo "<td>
                        <a class='acao-editar' href='Ucargo.php?id=" . htmlspecialchars($row['id_cargo']) . "'>Editar</a> 
                        <a class='acao-excluir' href='Dcargo.php?id=" . htmlspecialchars($row['id_cargo']) . "' onclick=\"return confirm('Tem certeza que deseja excluir este cargo?');\">Excluir</a>
                    </td>";
                echo "</tr>";
            }
            ?>
        </table>

        <br>
        <div class="botoes-container">
            <a href="Form_Cargo.php" class="botao">Cadastrar Novo Cargo</a>
            <a href="painel.php" class="botao botao-cinza">Voltar para o Painel</a>
        </div>
    </div>
</body>
</html>
