<?php

include_once('../config.php');

if (isset($_POST['update-aluguel'])) {
    $ChaveLivro = $_POST['fklivro'];
    $ChaveUsuario = $_POST['fkUsuario'];
    $Previsao = $_POST['previsaodevolucao'];

 

    $sqlUpdate = "UPDATE alugueis SET codelivros='$ChaveLivro', codeusuarios ='$ChaveUsuario', previsaodevolucao='$Previsao'
    WHERE idaluguel ='$id'";

    $result = $conexao->query($sqlUpdate);
}
header('Location: Aluguel.php');
?>