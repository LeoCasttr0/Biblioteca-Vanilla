<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inicializa variáveis de erro
    $errors = array();

    // Obtém os valores dos campos do formulário
    $admin = $_POST["admin"];
    $senha = $_POST["senha"];

    // Validação do campo "Usuário"
    if (empty($admin)) {
        $errors["admin"] = "Por favor, preencha o campo Usuário.";
    }

    // Validação do campo "Senha"
    if (empty($senha)) {
        $errors["senha"] = "Por favor, preencha o campo Senha.";
    }

    // Se não houver erros, processa os dados
    if (empty($errors)) {
        // Faça o que for necessário com os dados, por exemplo, autenticação do usuário
        // ...

        // Redireciona ou exibe uma mensagem de sucesso, conforme necessário
        // header("Location: página_de_sucesso.php");
        // exit();
    }
}
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça Seu Login</title>
    <script src="https://kit.fontawesome.com/f0d9a2c6e8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/login-adm.css">
</head>

<body>
    <img class="green-background" src="../Imagens/wave.png" alt="">
    <div class="container">
        <div class="img">
            <img src="../Imagens/undraw_Programming_re_kg9v (1).png" alt="">
        </div>

        <div class="login-container">
            <form action="testeLogin.php" id="FormLogin" method="POST" >
                <img class="avatar" src="../Imagens/biblioteca-fixpay-website-favicon-color_03_.ico" alt="imagem do homem no computador">
                <h2>Logue No Sistema</h2>

                <div class="input-div one">
                    <div class="i">
                        <i class="fa-solid fa-user"></i>
                    </div>
                
                    <div>
                        <h5>Usuário</h5>
                        <input class="input" name="admin" type="text" id="Nomeuser" required >
                        <!-- Exibe mensagem de erro, se houver -->
                  
                    </div>
                </div>

                <div class="input-div two">
                    <div class="i">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <div>
                        <h5>Senha</h5>
                        <input class="input" name="senha" type="password"  id="Nomesenha" required>
                        
                    </div>
                </div>

                <input type="submit" id="submit" name="submit-login" class="btn" value="login">
            </form>
        </div>
    </div>

    <script src="../JS/login.js"></script>
    <script src="../JS/validaçoes.js"></script>
</body>

</html>