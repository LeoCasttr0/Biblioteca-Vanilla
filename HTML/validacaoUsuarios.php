<?php
if (isset($_POST['submit-usuario']) && !empty($_POST['usuario']) && !empty($_POST['Email'])) {

header('Location: Usuarios.php');
include_once('../config.php');
$Usuario = $_POST['usuario'];
$Email = $_POST['Email'];

$result = mysqli_query($conexao, "INSERT INTO usuarios (nomeuser,emailuser) VALUES ('$Usuario','$Email')");

//print_r('Nome da Editora: ' . $_POST['editora']);
// print_r('<br>');
// print_r('Cidade da Editora: ' . $_POST['cidade']);
// print_r('<br>');


} else {
echo '<script> alert ("Você esqueceu de alguma informação, volte e insira de novo!"); location.href=("Usuarios.php")</script>';
}
?>