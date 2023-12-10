<?php

include_once('../config.php');

if (isset($_POST['update']))
 {
    $id = $_POST['id'];
    $Editora = $_POST['editora'];
    $Cidade = $_POST['cidade'];

    $sqlUpdate = "UPDATE editoras SET nomeeditora='$Editora', cidadeeditora='$Cidade'  WHERE id ='$id'";

    $result = $conexao->query($sqlUpdate);
}
header('Location: Editoras.php');


?>