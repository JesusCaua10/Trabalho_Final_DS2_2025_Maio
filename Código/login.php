<?php
include('conexao.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {

    if (strlen($_POST['email']) == 0) {
        echo "Preencha seu email";
    } elseif (strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $stmt = $pdo->prepare("SELECT * FROM funcionarios WHERE email = :email AND senha = :senha LIMIT 1");
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $user['id_funcionario'];
            $_SESSION['nome'] = $user['nome'];

            header("Location: painel.php");
            exit;

        } else {
            echo "Falha ao logar! Email ou senha incorretos";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - GestorFlex</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="form-box">
    <img src="imagens\0c2861b4-c44b-4544-8c21-9b318a8bab1f.png" alt="Logo" class="logo">
    <form method="post">
        <label class="label">Email:</label>
        <input type="email" name="email" class="input" required>

        <label class="label" >Senha:</label>
        <input type="password" name="senha" class="input" required>

        <button type="submit" class="button">Entrar</button>
    </form>
</div>
</body>
</html>
