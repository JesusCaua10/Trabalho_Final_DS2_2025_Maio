<?php
include('conexao.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM cargo WHERE id_cargo = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Cargo excluído com sucesso!";
        header("Location: Rcargo.php");
    } else {
        echo "Erro ao excluir cargo.";
    }
} else {
    echo "ID do cargo não especificado.";
}
?>