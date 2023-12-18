<?php

include_once('../config.php');

if (isset($_POST['update-livros'])) {
    $id = $_POST['idlivro'];
    $Livro = $_POST['Livro'];
    $Autor = $_POST['Autor'];
    $ChaveEditora = $_POST['fkeditora'];
    $Quantidade = $_POST['Quanti'];
   

    $sqlUpdate = "UPDATE livros SET nomelivro='$Livro', autorlivro ='$Autor', codeeditora='$ChaveEditora', quantlivros='$Quantidade'
    WHERE idlivro ='$id'";

    $result = $conexao->query($sqlUpdate);
}
header('Location: livros.php');
?>