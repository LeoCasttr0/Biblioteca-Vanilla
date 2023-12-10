<?php
include_once('../config.php');

if (isset($_POST['update-user']))
 {
    $id = $_POST['iduser'];
    $Usuario = $_POST['usuario'];
    $Email = $_POST['Email'];

    $sqlUpdate = "UPDATE usuarios SET nomeuser='$Usuario', emailuser='$Email' WHERE iduser='$id'";

    $result = $conexao->query($sqlUpdate);
}

header('Location: Usuarios.php');
?>