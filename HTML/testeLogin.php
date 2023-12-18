<?php
// print_r($_REQUEST);

session_start();
//se acertar a senha ,a pessoa entrará no sistema
//se nao estiver vazio
if (isset($_POST['submit-login']) && !empty($_POST['admin']) && !empty($_POST['senha'])) {

    include_once('../config.php');
    $Adm = $_POST['admin'];
    $Senha = $_POST['senha'];

    //print_r('Nome do ADM: ' . $Adm);
    //print_r('<br>');
    //print_r('Senha do ADM: ' . $Senha);

    //aqui ele esta selecionando do nosso banco de dados a tabela de login
    $sql = "SELECT * FROM login WHERE admsistema = '$Adm' AND senhasistema = '$Senha'";

    $result = $conexao->query($sql);

    //print_r($sql);
    //print_r($result);

    if (mysqli_num_rows($result) < 1) {
        //destruir estas informaçoes
        unset($_SESSION['admsistema']);
        unset($_SESSION['senhasistema']);
       
        echo '<script> alert ("Usuário ou Senha incorreto, Volte e insira De novo!"); location.href=("login-adm.php")</script>';

    } else {
        $_SESSION['admsistema'] = $Adm;
        $_SESSION['senhasistema'] = $Senha;
        header('Location: dashboard.php');
    }

    
    // se errar a senha, voltará para a tela login
}

?>