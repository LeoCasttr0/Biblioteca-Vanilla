<?php
if (isset($_POST['submit-livros']) && !empty($_POST['Livro']) && !empty($_POST['Autor']) && !empty($_POST['fkeditora']) && !empty($_POST['Quanti']) && !empty($_POST['Alug'])) {

    header('Location: livros.php');
    include_once('../config.php');
    $Livro = $_POST['Livro'];
    $Autor = $_POST['Autor'];
    $ChaveEditora = $_POST['fkeditora'];
    $Quantidade = $_POST['Quanti'];
    $Alugado = $_POST['Alug'];

    $result = mysqli_query($conexao, "INSERT INTO livros (nomelivro,autorlivro,codeeditora,quantlivros,quantalug) VALUES ('$Livro','$Autor','$ChaveEditora', '$Quantidade', '$Alugado')");


    //print_r('Nome da Editora: ' . $_POST['editora']);
// print_r('<br>');
// print_r('Cidade da Editora: ' . $_POST['cidade']);
// print_r('<br>');


} else {
    echo '<script> alert ("Você Esqueceu de Inserir alguma Informação, Volte e insira De novo!"); location.href=("livros.php")</script>';
}
?>