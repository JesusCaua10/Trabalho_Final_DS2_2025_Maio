<?php
include('conexao.php');
include('protect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $data_admissao = $_POST['data_admissao'];
    $senha = $_POST['Senha'];
    $cargo = $_POST['cargo'];

    $stmt = $pdo->prepare("SELECT * FROM funcionarios WHERE cpf = :cpf");
    $stmt->bindValue(':cpf', $cpf);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "CPF já cadastrado. Por favor, use outro CPF.";
    } else {
        $stmt = $pdo->prepare("UPDATE funcionarios SET nome = :nome, email = :email, data_admissao = :data_admissao, senha = :senha, id_cargo = :cargo WHERE cpf = :cpf");
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':cpf', $cpf);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':data_admissao', $data_admissao);
        $stmt->bindValue(':senha', password_hash($senha, PASSWORD_DEFAULT));
        $stmt->bindValue(':cargo', $cargo);

        if ($stmt->execute()) {
            echo "Funcionário atualizado com sucesso!";
            header("Location: Rfuncionarios.php");
            exit();
        } else {
            echo "Erro ao atualizar funcionário.";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Ufuncionarios.css">
</head>
<body>
   <div>
        <form action="" method="post">
            <h1>Editar Funcionários</h1>
            <label>Nome:</label>
            <input type="text" name="nome" required>
            <br>
            <label>CPF:</label>
            <input type="text" name="cpf" required>
            <br>
            <label>Email:</label>
            <input type="email" name="email" required>
            <br>
            <label>Data de Admissão:</label>
            <input type="date" name="data_admissao" required>
            <br>
            <label>Senha:</label>
            <input type="text" name="Senha" required>    
            <br>
            <label>Cargo:</label>
            <select name="cargo" required>
                <?php
                $stmt = $pdo->prepare("SELECT * FROM cargo");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . htmlspecialchars($row['id_cargo']) . "'>" . htmlspecialchars($row['nome_cargo']) . "</option>";
                }
                ?>
            </select>
            <br>
            <button type="submit">Editar</button>
            <a href="Rfuncionarios.php">Voltar</a>
        </form>
    </div>
</body>
</html>