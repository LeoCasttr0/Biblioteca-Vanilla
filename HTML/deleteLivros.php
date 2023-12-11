<?php

if (!empty($_GET['idlivro'])) {
    include_once('../config.php');

    $id = $_GET['idlivro'];

    $sqlSelect = "SELECT * FROM livros WHERE idlivro = $id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        // Excluir o registro
        $sqlDelete = "DELETE FROM livros WHERE idlivro = $id";
        $resultDelete = $conexao->query($sqlDelete);
    }
}

header('Location: livros.php');
?>