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
            <form action="testeLogin.php" method="POST">
                <img class="avatar" src="../Imagens/biblioteca-fixpay-website-favicon-color_03_.ico" alt="imagem do homem no computador">
                <h2>Logue No Sistema</h2>

                <div class="input-div one">
                    <div class="i">
                        <i class="fa-solid fa-user"></i>
                    </div>
                
                    <div>
                        <h5>Usuário</h5>
                        <input class="input" name="admin" type="text">
                    </div>
                </div>

                <div class="input-div two">
                    <div class="i">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <div>
                        <h5>Senha</h5>
                        <input class="input" name="senha" type="password">
                    </div>
                </div>

                <input type="submit" id="submit" name="submit-login" class="btn" value="login">
            </form>
        </div>
    </div>

    <script src="../JS/login.js"></script>
</body>

</html>