<?php

include_once('../config.php');

if (isset($_POST['update-aluguel'])) {
    $id = $_POST['idaluguel'];
    $ChaveLivro = $_POST['fklivro'];
    $ChaveUsuario = $_POST['fkUsuario'];
    $DataAluguel = $_POST['Datealuguel'];
    $DataDevolucao = $_POST['Devolucao'];


    $sqlUpdate = "UPDATE alugueis SET codelivros='$ChaveLivro', codeusuarios ='$ChaveUsuario', dataaluguel='$DataAluguel', datadevolu='$DataDevolucao'
    WHERE idaluguel ='$id'";

    $result = $conexao->query($sqlUpdate);
}
header('Location: Aluguel.php');
?>