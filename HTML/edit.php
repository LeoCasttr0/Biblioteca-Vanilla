<?php

if (!empty($_GET['id'])) {

    include_once('../config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT *FROM editoras WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {

        while ($user_data = mysqli_fetch_assoc($result)) {
            $Editora = $user_data['nomeeditora']; 
            $Cidade = $user_data['cidadeeditora'];
        }

    } else {
        header('Location: Editoras.php');
    }
} else {
    header('Location: Editoras.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edite a Editora</title>
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
                <h2>Edite a Editora</h2>
            </section>

            <!--corpo do form-->
            <form id="form " action="save.php" method="POST" class="form">
                <div class="form-content">
                    <label for="Editora">Nome</label>
                    <input type="text" id="editora" name="editora" placeholder="Digite a Editora"
                        value=" <?php echo $Editora ?>" required>
                    <!--modal-->
                    <a>Deu erroooo</a>
                </div>

                <div class="form-content">
                    <label for="cidade">Cidade </label>
                    <input type="text" name="cidade" id="cidade" placeholder="Digite a Cidade da Editora"
                        value=" <?php echo $Cidade ?>" required>>
                    <!--modal-->
                    <a>Deu erroooo</a>
                </div>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <button type="submit" name="update" id="update">Alterar</button>
            </form>
        </div>
    </div>
</body>

</html>