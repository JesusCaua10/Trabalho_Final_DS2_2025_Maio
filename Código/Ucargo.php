<?php
include('conexao.php');
if (isset($_POST['nome']) && isset($_POST['salario'])) {
    if (strlen($_POST['nome']) == 0) {
        echo "Preencha o nome do cargo";
    } elseif (strlen($_POST['salario']) == 0) {
        echo "Preencha o salário base";
    } else {
        $nome = $_POST['nome'];
        $salario = $_POST['salario'];

        $stmt = $pdo->prepare("UPDATE cargo SET nome_cargo = :nome, salario_base = :salario WHERE id_cargo = :id");
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':salario', $salario);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Cargo atualizado com sucesso!";
            header("Location: Rcargo.php");
        } else {
            echo "Erro ao atualizar cargo.";
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
</head>
<body>
    <h1>Editar Cargos</h1>
    <div>
        <form action="" method="post">
            <label>Nome do Cargo:</label>
            <input type="text" name="nome" required>
            <br>
            <label>Salário Base:</label>
            <input type="number" name="salario" required>
            <br>
            <button type="submit">Editar</button>
        </form>


</body>
</html>