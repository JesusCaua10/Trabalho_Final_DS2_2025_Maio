<?php
include('conexao.php');
include('protect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários - GestorFlex</title>
    <link rel="stylesheet" href="Rfuncionarios.css">
</head>
<body>

<div class="container">
    <h1>Lista de Funcionários</h1>
    <table>
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
        $stmt = $pdo->query("SELECT f.id_funcionario, f.nome, f.cpf, f.email, f.data_admissao, c.nome_cargo 
                              FROM funcionarios f 
                              JOIN cargo c ON f.id_cargo = c.id_cargo");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id_funcionario']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
            echo "<td>" . htmlspecialchars($row['cpf']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['data_admissao']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nome_cargo']) . "</td>";
            echo "<td>
                    <a class='btn edit' href='Ufuncionarios.php?id=" . $row['id_funcionario'] . "'>Editar</a>
                    <a class='btn delete' href='Dfuncionarios.php?id=" . $row['id_funcionario'] . "' 
                    onclick=\"return confirm('Tem certeza que deseja excluir este funcionário?')\">Excluir</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
    <div class="actions">
        <a href="Form_Funcionarios.php" class="btn new">Cadastrar novo funcionário</a>
        <a href="painel.php" class="btn back">Voltar para o Painel</a>
    </div>
</div>

</body>
</html>
