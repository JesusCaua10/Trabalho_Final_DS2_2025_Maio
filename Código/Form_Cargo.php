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

        $stmt = $pdo->prepare("INSERT INTO cargo (nome_cargo, salario_base) VALUES (:nome, :salario)");
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':salario', $salario);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Cargo cadastrado com sucesso!";
            header("Location: Rcargo.php");
        } else {
            echo "Erro ao cadastrar cargo.";
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
    
    <Div>
        <form action="" method="post">
            <h1>Cadastro de Cargo</h1>
            <label>Nome do Cargo:</label>
            <input type="text"  name="nome" required>
            <br>
            <label>Salário Base:</label>
            <input type="number" name="salario" required>
            <br>
            <button type="submit">Cadastrar novo cargo</button>
        </form>
    </Div>

</body>
</html>