<?php
//Aqui ele vai verificar o forms que tem o metodo post de o elemento que tem o name submit

// Caminho do config php (local onde está nosso banco de dados)
include_once('../config.php');

if (isset($_POST['submit-aluguel'])) {
    $Hoje = date('Y/m/d');
    $ChaveLivro = $_POST['fklivro'];
    $ChaveUsuario = $_POST['fkUsuario'];
    $DataAluguel = $Hoje;
    $Previsao = $_POST['Previsao'];


    // Atualizar o estoque ao alugar
    $sqlUpdateEstoqueAlugar = "UPDATE livros SET quantlivros = quantlivros - 1 WHERE idlivro = '$ChaveLivro'";
    $resultUpdateEstoqueAlugar = $conexao->query($sqlUpdateEstoqueAlugar);


    $result = mysqli_query($conexao, "INSERT INTO alugueis (codelivros,codeusuarios,dataaluguel,previsaodevolucao) VALUES ('$ChaveLivro','$ChaveUsuario','$DataAluguel','$Previsao')");
}


if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM alugueis WHERE idaluguel LIKE '%$data%' or codelivros LIKE '%$data%' or codeusuarios LIKE '%$data%' ORDER BY idaluguel DESC";
} else {
    // Consulta padrão se não houver pesquisa
    $sql = "SELECT * FROM alugueis ORDER BY idaluguel DESC";
}

$result = $conexao->query($sql);
$mostrarIcones = true;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluguéis</title>
    <link rel="stylesheet" href="../CSS/aluguel.css">
    <!--icone--->
    <script src="https://kit.fontawesome.com/f0d9a2c6e8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="shortcut icon" type="imagex/png" href="../Imagens/biblioteca-fixpay-website-favicon-color_04_.ico">
</head>

<body>

    <!--SIDEBAR-->
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../Imagens/biblioteca-fixpay-website-favicon-color_04_.ico" alt="logo">
                </span>

                <div class="text header-text">
                    <span class="name">Biblioteca </span>
                    <span class="profession">Fixpay</span>
                </div>
            </div>
            <i class="bi bi-caret-right-fill toggle"></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="../HTML/dashboard.php"><i class="bi bi-columns-gap icon"></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>


                    <li class="nav-link">
                        <a href="../HTML/Editoras.php"><i class="bi bi-shop icon"></i>
                            <span class="text nav-text">Editoras</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../HTML/Usuarios.php"><i class="bi bi-person-workspace icon"></i></i>
                            <span class="text nav-text">Usuários</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../HTML/livros.php"><i class="bi bi-journal-bookmark-fill icon"></i>
                            <span class="text nav-text">Livros</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../HTML/Aluguel.php"><i class="bi bi-journal-check icon"></i>
                            <span class="text nav-text">Aluguéis</span>
                        </a>
                    </li>
                </ul>
                <div class="bottom-content">
                    <li class="">
                        <a href="../HTML/login-adm.php"><i class="bi bi-box-arrow-left icon"></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>

                    <li class="mode">
                        <div class="moon-sun">
                            <i class="bi bi-moon icon moon"></i>
                            <i class="bi bi-brightness-high icon sun"></i>
                        </div>
                        <span class="mode-text text toggle-text">Modo Dark</span>

                        <div class="toggle-switch">
                            <span class="switch"></span>
                        </div>
                    </li>

                </div>
            </div>
        </div>
    </nav>

    <!--Menu Responsivo-->
    <div class="header-responsive">
        <button class="button-mobile" onclick="iconMenu()">
            <i class="bi bi-list"></i>

        </button>
        <img class="logo-white" src="../Imagens/biblioteca-fixpay-logo(white).png" alt="">
    </div>


    <nav class="menu-mobile" id="menu-mobile">

        <button class="close-button" onclick="iconMenu()">
            <span><i class="bi bi-x-circle-fill icon"></i></span>
        </button>
        <img class="menu-mobile-img" src="../Imagens/biblioteca-fixpay-logo(white).png" alt="">

        <button>
            <span>


                <button class="mobile-link"> <i class="bi bi-columns-gap icon"></i> <a
                        href="../HTML/dashboard.php">Dashboard</a> </button>
            </span>
        </button>

        <button>
            <span>

                <button class="mobile-link"> <i class="bi bi-journal-bookmark-fill icon"></i><a
                        href="../HTML/Aluguel.php">Aluguéis</a></button>
            </span>
        </button>

        <button>
            <span>

                <button class="mobile-link"> <i class="bi bi-shop icon"></i><a
                        href="../HTML/Editoras.php">Editoras</a></button>
            </span>
        </button>

        <button>
            <span>

                <button class="mobile-link"> <i class="bi bi-shop icon"></i><a
                        href="../HTML/livros.php">Livros</a></button>
            </span>
        </button>

        <button>
            <span>

                <button class="mobile-link"> <i class="bi bi-shop icon"></i><a
                        href="../HTML/Usuarios.php">Usuários</a></button>
            </span>
        </button>
        <button>
            <span>
                <button class="mobile-link"> <i class="bi bi-box-arrow-left icon"></i> <a
                        href="../HTML/login-adm.php">Logout</a></button>
            </span>
        </button>
    </nav>


    <main>
        <div class="table-container">
            <div class="main-title"> ALUGUÉIS
                <!--botao do modal-->
                <button class="open-modal-button"><i class="bi bi-plus-circle-fill add-icone"></i></button>
            </div>

            <section class="header">
                <div class="items-controller">
                    <h5>Mostrar</h5>
                    <select name="" id="itemperpage">
                        <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3" selected>03</option>

                    </select>
                    <h5>Por Página</h5>
                </div>
                <div class="search">
                    <h5>Procure pelo ID</h5>
                    <input type="text" name="" id="search" placeholder="Digite Aqui">

                </div>
            </section>
            <section class="field">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Usuário</th>
                        <th>Livro</th>
                        <th>Data do Aluguel</th>
                        <th>Previsão de Devolução</th>
                        <th>Data de Devolução</th>
                        <th>Status</th>
                        <th>Ações</th>

                    </thead>

                    <tbody>
                        <?php
                        while ($user_data = mysqli_fetch_assoc($result)) {
                            $iduser = $user_data['codeusuarios'];
                            $sqluser = "select * from usuarios where iduser = '$iduser' ";
                            $resultuser = $conexao->query($sqluser);
                            $usuario_data = mysqli_fetch_assoc($resultuser);

                            $idlivro = $user_data['codelivros'];
                            $sqllivro = "select * from livros where idlivro = '$idlivro' ";
                            $resultlivro = $conexao->query($sqllivro);
                            $livro_data = mysqli_fetch_assoc($resultlivro);


                            echo "<tr>";
                            echo "<td data-label='ID'>" . $user_data['idaluguel'] . "</td>";

                            echo "<td  data-label='Usuario'>" . $usuario_data['nomeuser'] . "</td>";
                            echo "<td  data-label='Autor'>" . $livro_data['nomelivro'] . "</td>";
                            echo "<td  data-label='Quantidade'>" . $user_data['dataaluguel'] . "</td>";
                            echo "<td  data-label='Quantidade'>" . $user_data['previsaodevolucao'] . "</td>";
                            echo "<td  data-label='Alugado'>" . $user_data['datadevolu'] . "</td>";

                            //Status da Tabela
                        
                            echo "<td data-label='Status'>";
                            // Aqui eu Verifico se a devolução está atrasada
                            if (!empty($user_data['previsaodevolucao']) && !empty($user_data['datadevolu'])) {
                                //Definindo a previsao de devoluçao e devoluçao
                                $previsao = strtotime($user_data['previsaodevolucao']);
                                $devolucao = strtotime($user_data['datadevolu']);
// se a Data devoluçao for maior que a data de previsao, o livro estará atrasado.

                                if ($devolucao > $previsao) {
                                    echo "Devolvido Atrasado";
                                }
                                //Se nao, devolvido no prazo 
                                else {
                                    echo "Devolvido No prazo";
                                }
                                // se nao tiver apertado no icone de devolver, o status do livro diz que ele nao foi devolvido ainda.
                            } else {
                                echo "Livro Não devolvido";
                            }
                            echo "</td>";

                            //Açoes : apagar,devolver e deletar.
                            echo '<td data-label="Ações">
                            <div id="conteudo_' . $user_data['idaluguel'] . '">
                                <a href="editaluguel.php?idaluguel=' . $user_data['idaluguel'] . '">
                                    <i class="edit bi bi-pencil-fill"></i>
                                </a>
                                
                                <a href="deleteAluguel.php?idaluguel=' . $user_data['idaluguel'] . '">
                                    <i class="trash bi bi-trash3-fill"></i>
                                </a>

                                <a href="devolver.php?idaluguel=' . $user_data['idaluguel'] . '">
                                <i class="fa-solid fa-calendar-check devolver-icone" style="color: #35c318;"></i>
                                </a>
                            </div>
                         </td>';
                            // Fechamento da linha para cada registro
                        
                        } ?>
                    </tbody>
                </table>
                <!--Paginaçao-->
                <div class="bottom-field">
                    <ul class="pagination">
                        <li class="list prev"><a href="#" data-page="1">1</a></li>
                        <li class="list next"><a href="#" data-page="2">2</a></li>
                        <!-- Adicione mais elementos conforme necessário -->
                    </ul>
                </div>
            </section>
        </div>

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
                    <h2>Cadastre Aqui</h2>
                </section>

                <!--corpo do form-->
                <!--select de livros-->
                <form class="form" action="Aluguel.php" method="POST">

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

                        <select name="fkUsuario">
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
                        <label>Previsão de Devolução</label>
                        <input type="date" id="Previsao" name="Previsao">
                    </div>
                    <button type="submit" name="submit-aluguel" id="submit">Cadastrar</button>

                </form>
            </div>
        </div>
    </main>



    <!--JS-->
    <!-- JS -->
    <script src="../JS/devolver.js"></script>
    <script src="../JS/pesquisarAluguel.js"></script>
    <script src="../JS/modal.js"></script>
    <script src="../sidebar/sidebar.js"></script>
    <script src="../JS/alugueis.js"></script>


</body>

</html>