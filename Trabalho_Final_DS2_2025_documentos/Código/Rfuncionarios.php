<?php
include('conexao.php');
include('protect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de Funcionários</h1>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Data de Admissão</th>
                <th>Cargo</th>
                <th>Ações</th>
            </tr>
            <?php
            $stmt = $pdo->query("SELECT f.id_funcionario, f.nome, f.cpf, f.email, f.data_admissao, c.nome_cargo FROM funcionarios f JOIN cargo c ON f.id_cargo = c.id_cargo");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['id_funcionario'] . "</td>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['cpf'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['data_admissao'] . "</td>";
                echo "<td>" . $row['nome_cargo'] . "</td>";
                echo "<td><a href='Ufuncionarios.php?id=" . $row['id_funcionario'] . "'>Editar</a> | <a href='Dfuncionarios.php?id=" . $row['id_funcionario'] . "'>Excluir</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>