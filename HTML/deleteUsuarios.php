<?php

if (!empty($_GET['iduser'])) {
    include_once('../config.php');

    $id = $_GET['iduser'];

    $sqlSelect = "SELECT * FROM usuarios WHERE iduser=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        // Excluir o registro
        $sqlDelete = "DELETE FROM usuarios WHERE iduser = $id";
        $resultDelete = $conexao->query($sqlDelete);

    }
}
header('Location: Usuarios.php');
?>