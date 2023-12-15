<?php

if (!empty($_GET['idaluguel'])) {

    include_once('../config.php');

    $id = $_GET['idaluguel'];

    $sqlSelect = "SELECT * FROM alugueis WHERE idaluguel = $id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {

        while ($user_data = mysqli_fetch_assoc($result)) {
            $ChaveLivro = $user_data['codelivros'];
            $ChaveUsuario = $user_data['codeusuarios'];
            $DataAluguel = $user_data['dataaluguel'];
            $DataDevolucao = $user_data['datadevolu'];
        }

    } else {
        header('Location: Aluguel.php');
    }
} else {
    header('Location: Aluguel.php');
}



?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edite o Aluguel </title>
    <link rel="stylesheet" href="../CSS/edit.css">
</head>

<body>

<!--php pra chamar resultados do banco de dados para o formulário-->
<?php
        require '../config.php';
        $sql = "select * from editoras;";
        $result = mysqli_query($conexao, $sql); ?>

        <?php
        require '../config.php';
        $sql = "select * from usuarios;";
        $resultUSUARIOS = mysqli_query($conexao, $sql); ?>

        <?php
        require '../config.php';
        $sql = "select * from livros;";
        $resultLIVROS = mysqli_query($conexao, $sql); ?>
        <!--fim-->


    <!--Modal Formulario--->
    <div class="modal-container">
        <div class="modal">
            <!--Formulario-->
            <!--cabeçalho do form-->
            <section class="header-form">
                <h2>Edite o Aluguel</h2>
            </section>

            <!--corpo do form-->
            <!--select de livros-->
            <form class="form" action="saveAluguel.php" method="POST">

                <div class="form-content" method="get">
                    <label for="Livro">Nome do Livro</label>

                    <select name="fklivro" class="select-Spacing">
                        <option value="selecione" selected> Selecione um Livro </option>
                        <?php
                        while ($dadosLivro = mysqli_fetch_assoc($resultLIVROS)) {
                            ?>
                            <option value="<?php echo $dadosLivro['idlivro'] ?>">
                                <?php echo $dadosLivro['nomelivro'] ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <!--select de Usuarios-->

                <div class="form-content" method="get">
                    <label for="Editora">Nome do Usuário</label>

                    <select name="fkUsuario" value="<?php echo $ChaveUsuario ?>" required>
                        <option value="selecione" selected> Selecione um Usuário </option>
                        <?php
                        while ($dadosUsuario = mysqli_fetch_assoc($resultUSUARIOS)) {
                            ?>
                            <option value="<?php echo $dadosUsuario['iduser'] ?>">
                                <?php echo $dadosUsuario['nomeuser'] ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-content">
                    <label for="Datealuguel">Data do Aluguel</label>
                    <input type="date" id="Datealuguel" name="Datealuguel" min="2023-11-10" value="<?php echo $DataAluguel ?>" required>

                </div>

                <div class="form-content">
                    <label for="Datealuguel">Data de Devolução</label>
                    <input type="date" id="Devolucao" name="Devolucao" min="2023-11-10" value="<?php echo $DataDevolucao ?>" required>

                </div>

                <input type="hidden" name="idaluguel" value="<?php echo $id ?>">
                <button type="submit" name="update-aluguel" id="update-aluguel">Cadastrar</button>

            </form>
        </div>
    </div>
</body>

</html>