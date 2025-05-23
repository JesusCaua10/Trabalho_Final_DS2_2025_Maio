<?php
require_once "conexao.php";

$mensagem = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $data_admissao = $_POST['data_admissao'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $salario_base = $_POST['salario_base'];
    $id_cargo = $_POST['id_cargo'];

    try {
        $stmt = $pdo->prepare("INSERT INTO Funcionarios (nome, cpf, data_admissao, email, senha, id_cargo) VALUES (:nome, :cpf, :data, :email, :senha, :cargo)");
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':cpf', $cpf);
        $stmt->bindValue(':data', $data_admissao);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha);
        $stmt->bindValue(':cargo', $id_cargo);
        $stmt->execute();

        $mensagem = "Funcionário cadastrado com sucesso!";
    } catch (PDOException $e) {
        $mensagem = "Erro: " . $e->getMessage();
    }
}

$cargos = $pdo->query("SELECT * FROM Cargo")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Funcionários</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-box">
    <h2>Cadastro de Funcionários</h2>
    <form method="post">
        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>CPF:</label>
        <input type="text" name="cpf" required>

        <div class="row">
            <div>
                <label>Data de Admissão:</label>
                <input type="date" name="data_admissao" required>
            </div>
            <div>
                <label>Cargo:</label>
                <select name="id_cargo" required>
                    <option value="">Selecione</option>
                    <?php foreach($cargos as $cargo): ?>
                        <option value="<?= $cargo['id_cargo'] ?>"><?= $cargo['nome_cargo'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Senha:</label>
        <input type="password" name="senha" required>

        <label>Salário Base:</label>
        <input type="text" name="salario_base">

        <button type="submit">Cadastrar</button>
        <p><a href="login.php">Já tem login? Clique aqui!</a></p>
        <p><?= $mensagem ?></p>
    </form>
</div>
</body>
</html>
