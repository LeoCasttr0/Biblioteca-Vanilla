<?php
if (isset($_POST['submit-livros']) && !empty($_POST['Livro']) && !empty($_POST['Autor'])  && !empty($_POST['Quanti'])) {

    header('Location: livros.php');
    include_once('../config.php');
    $Livro = $_POST['Livro'];
    $Autor = $_POST['Autor'];
    $ChaveEditora = $_POST['fkeditora'];
    $Quantidade = $_POST['Quanti'];
  

    $result = mysqli_query($conexao, "INSERT INTO livros (nomelivro,autorlivro,codeeditora,quantlivros,) VALUES ('$Livro','$Autor','$ChaveEditora', '$Quantidade')");


} else {
    echo '<script> alert ("Você Esqueceu de Inserir alguma Informação, Volte e insira De novo!"); location.href=("livros.php")</script>';
}
?>