<?php
include('conexao.php');
include('protect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $data_admissao = $_POST['data_admissao'];
    $senha = $_POST['senha'];
    $cargo = $_POST['cargo'];

    $stmt = $pdo->prepare("SELECT * FROM funcionarios WHERE cpf = :cpf");
    $stmt->bindValue(':cpf', $cpf);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "CPF já cadastrado. Por favor, use outro CPF.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO funcionarios (nome, cpf, email, data_admissao, senha, id_cargo) VALUES (:nome, :cpf, :email, :data_admissao, :senha, :cargo)");
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':cpf', $cpf);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':data_admissao', $data_admissao);
        $stmt->bindValue(':senha', $senha);
        $stmt->bindValue(':cargo', $cargo);

        if ($stmt->execute()) {
            echo "Funcionário cadastrado com sucesso!";
            header("Location: Rfuncionarios.php");
            exit();
        } else {
            echo "Erro ao cadastrar funcionário.";
        }
    }
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Funcionário - GestorFlex</title>
    <link rel="stylesheet" href="Form_Funcionarios.css">
</head>
<body>

<div class="container">
    <h1>Cadastro de Funcionários</h1>
    <form action="" method="post">

        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>CPF:</label>
        <input type="text" name="cpf" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Data de Admissão:</label>
        <input type="date" name="data_admissao" required>

        <label>Senha:</label>
        <input type="password" name="senha" required>    

        <label>Cargo:</label>
        <select name="cargo" required>
            <option value="">Selecione...</option>
            <?php
            $stmt = $pdo->prepare("SELECT * FROM cargo");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . htmlspecialchars($row['id_cargo']) . "'>" . htmlspecialchars($row['nome_cargo']) . "</option>";
            }
            ?>
        </select>

        <button type="submit">Cadastrar Funcionário</button>
        <a class="botao" href="Rfuncionarios.php">Voltar</a>
    </form>
</div>

</body>
</html>
