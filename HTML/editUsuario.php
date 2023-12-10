<?php

if (!empty($_GET['iduser'])) {

    include_once('../config.php');

    $id = $_GET['iduser'];

    $sqlSelect = "SELECT * FROM usuarios WHERE iduser = $id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {

        while ($user_data = mysqli_fetch_assoc($result)) {
            $Usuario = $user_data['nomeuser'];
            $Email = $user_data['emailuser'];
        }

    } else {
        header('Location: Usuarios.php');
    }
} else {
    header('Location: Usuarios.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edite o Usuário</title>
    <link rel="stylesheet" href="../CSS/edit.css">
    <link rel="shortcut icon" type="imagex/png" href="../Imagens/biblioteca-fixpay-website-favicon-color_04_.ico">
</head>

<body>

    <!--Modal editar -->
    <div class="modal-container">
        <div class="modal">
            <!--Formulario-->
            <!--cabeçalho do form-->
            <section class="header-form">
                <h2>Edite o Usuário</h2>
            </section>

            <!--corpo do form-->
            <form class="form" action="saveUsuario.php" method="POST">

                <div class="form-content">
                    <label for="usuario">Nome </label>
                    <input type="text" name="usuario" id="usuario" placeholder="Digite o Nome"  value=" <?php echo $Usuario ?>" required>

                    <!--modal-->
                    <a>Deu erroooo</a>
                </div>

                <div class="form-content">
                    <label for="Email">Email </label>
                    <input type="text" name="Email" id="Email" placeholder="Digite o Email" value=" <?php echo $Email ?>" required>

                    <!--modal-->
                    <a>Deu erroooo</a>
                </div>

                <input type="hidden" name="iduser" value="<?php echo $id ?>">
                <button type="submit" name="update-user" id="update-user">Cadastrar</button>
            </form>
        </div>
    </div>
</body>

</html>