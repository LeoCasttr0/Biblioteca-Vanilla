<?php

if (!empty($_GET['idlivro'])) {

    include_once('../config.php');

    $id = $_GET['idlivro'];

    $sqlSelect = "SELECT * FROM livros WHERE idlivro = $id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {

        while ($user_data = mysqli_fetch_assoc($result)) {
            $Livro = $user_data['nomelivro'];
            $Autor = $user_data['autorlivro'];
            $ChaveEditora = $user_data['codeeditora'];
            $Quantidade = $user_data['quantlivros'];
            $Alugado = $user_data['quantalug'];
        }

    } else {
        header('Location: livros.php');
    }
} else {
    header('Location: livros.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edite o Livro </title>
    <link rel="stylesheet" href="../CSS/edit.css">
</head>
<body>
    
<?php
        require '../config.php';
        $sql = "select * from editoras;";
        $result = mysqli_query($conexao, $sql); ?>

<!--Modal-->
<div class="modal-container">
            <div class="modal">
                <!--Formulario-->
                <!--cabeçalho do form-->
                <section class="header-form">
                    <h2>Edite o Livro</h2>
                </section>

                <!--corpo do form-->
                <form id="form " action="saveLivros.php" method="POST" class="form">

                    <div class="form-content">
                        <label for="Livro">Nome do Livro</label>
                        <input type="text" id="Livro" name="Livro" placeholder="Digite o Nome do Livro"
                        value=" <?php echo $Livro ?>" required>
                        <!--modal-->
                        <a>Deu erroooo</a>
                    </div>

                    <div class="form-content">
                        <label for="Autor">Autor do Livro</label>
                        <input type="text" id="Autor" name="Autor" placeholder="Digite o Autor deste Livro"
                        value=" <?php echo $Autor ?>" required>
                        <!--modal-->
                        <a>Deu erroooo</a>
                    </div>


                    <div class="form-content" method="get">
                        <label for="Editora">Editora</label>

                        <select name="fkeditora"
                        value=" <?php echo $ChaveEditora ?>" required>
                            <?php
                            while ($dados = mysqli_fetch_assoc($result)) {
                                ?>
                                <option value="<?php echo $dados['id'] ?>">
                                    <?php echo $dados['nomeeditora'] ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>

                        <!--modal-->
                        <a>Deu erroooo</a>
                    </div>

                    <div class="form-content">
                        <label for="Quantidade">Quantidade do Livro</label>
                        <input type="number" id="Quanti" name="Quanti" placeholder="Digite a quantidade de exemplares "
                        value="<?php echo $Quantidade ?>" required>

                        <!--modal-->
                        <a>Deu erroooo</a>
                    </div>

                    <div class="form-content">
                        <label for="Quantidade">Quantidade Alugada deste Livro</label>
                        <input type="number" id="Alug" name="Alug" placeholder="Digite quantidade alugada deste livro"  value="<?php echo $Alugado ?>" required>

                        <!--modal-->
                        <a>Deu erroooo</a>
                    </div>


                    <input type="hidden" name="idlivro" value="<?php echo $id ?>">
                    <button type="submit" name="update-livros" id="update-livros">Alterar</button>
                </form>

            </div>
        </div>
</body>
</html>