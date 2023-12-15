<?php

if (!empty($_GET['idaluguel'])) {
    include_once('../config.php');

    $id = $_GET['idaluguel'];

    $sqlSelect = "SELECT * FROM alugueis WHERE idaluguel=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        // Excluir o registro
        $sqlDelete = "DELETE FROM alugueis WHERE idaluguel = $id";
        $resultDelete = $conexao->query($sqlDelete);

    }
}
header('Location: Aluguel.php');
?>