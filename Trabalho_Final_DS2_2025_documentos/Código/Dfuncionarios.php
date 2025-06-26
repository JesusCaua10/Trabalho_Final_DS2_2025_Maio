<?php
include('conexao.php');
include('protect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM funcionarios WHERE id_funcionario = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Funcionário excluído com sucesso!";
        header("Location: Rfuncionarios.php");
        exit();
    } else {
        echo "Erro ao excluir funcionário.";
    }
}
?>