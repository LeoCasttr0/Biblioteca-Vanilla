<?php

if (isset($_POST['submit-editora']) && !empty($_POST['editora']) && !empty($_POST['cidade'])) {

    header('Location: Editoras.php');
    include_once('../config.php');
    $Editora = $_POST['editora'];
    $Cidade = $_POST['cidade'];

    //print_r('Nome da Editora: ' . $_POST['editora']);
   // print_r('<br>');
   // print_r('Cidade da Editora: ' . $_POST['cidade']);
   // print_r('<br>');

   $result = mysqli_query($conexao, "INSERT INTO editoras (nomeeditora,cidadeeditora) VALUES ('$Editora','$Cidade')");

} else {
  echo '<script> alert ("Você esqueceu de alguma informação, volte e insira de novo!"); location.href=("Editoras.php")</script>';
}
?>
