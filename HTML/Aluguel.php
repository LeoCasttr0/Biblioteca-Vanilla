<?php
//Aqui ele vai verificar o forms que tem o metodo post de o elemento que tem o name submit

// Caminho do config php (local onde está nosso banco de dados)
include_once('../config.php');

if (isset($_POST['submit-usuario'])) {

    $Usuario = $_POST['usuario'];
    $Email = $_POST['Email'];

    $result = mysqli_query($conexao, "INSERT INTO usuarios (nomeuser,emailuser) VALUES ('$Usuario','$Email')");

}

if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM usuarios WHERE iduser LIKE '%$data%' or nomeuser LIKE '%$data%' or emailuser LIKE '%$data%' ORDER BY iduser DESC";
} else {
    // Consulta padrão se não houver pesquisa
    $sql = "SELECT * FROM usuarios ORDER BY iduser DESC";
}

$result = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluguéis</title>
    <link rel="stylesheet" href="../CSS/aluguel.css">
    <!--icone--->
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
                    <h5>Procurar</h5>
                    <input type="text" name="" id="search" placeholder="Digite Aqui">
                </div>
            </section>
            <section class="field">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Usuário</th>
                        <th>Livro</th>
                        <th>Editora</th>
                        <th> Data do Aluguel</th>
                        <th>Data de Devolução</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </thead>

                    <tbody>
                        <tr>
                            <td data-label="ID">1</td>
                            <td data-label="Usuário">Armando Couto</td>
                            <td data-label="Livro">Computação Evolucionária</td>
                            <td data-label="Editora">Casa do Código</td>
                            <td data-label="Data do Aluguel">01/09</td>
                            <td data-label="Data de Devolução">15/09</td>
                            <td data-label="Status"><button class="status-btn ontime">No Prazo</button></td>
                            <td data-label="Ações">
                                <i class='edit bi bi-pencil-fill'></i>
                                <i class="book bi bi-file-check-fill"></i>
                                <i class="trash bi bi-trash3-fill"></i>
                            </td>
                        </tr>

                        <tr>
                            <td data-label="ID">2</td>
                            <td data-label="Usuário">Lucas Camelo</td>
                            <td data-label="Livro">Python e R para o Cientista de Dados Moderno</td>
                            <td data-label="Editora">Casa do Código</td>
                            <td data-label="Data do Aluguel">10/09</td>
                            <td data-label="Data de Devolução">30/09</td>
                            <td data-label="Status"><button class="status-btn ontime">No Prazo</button></td>
                            <td data-label="Ações">
                                <i class='edit bi bi-pencil-fill'></i>
                                <i class="book bi bi-file-check-fill"></i>
                                <i class="trash bi bi-trash3-fill"></i>
                            </td>
                        </tr>

                        <tr>
                            <td data-label="ID">3</td>
                            <td data-label="Usuário">Rayane Marusca</td>
                            <td data-label="Livro">Guia da Startup</td>
                            <td data-label="Editora">Casa do Código</td>
                            <td data-label="Data do Aluguel">01/09</td>
                            <td data-label="Data de Devolução">30/09</td>
                            <td data-label="Status"><button class="status-btn late">Atrasado</button></td>
                            <td data-label="Ações">
                                <i class='edit bi bi-pencil-fill'></i>
                                <i class="book bi bi-file-check-fill"></i>
                                <i class="trash bi bi-trash3-fill"></i>
                            </td>
                        </tr>

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

                        <select name="fklivro">
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

                        <!--select de Editoras-->
                        <div class="form-content" method="get">
                            <label for="Editora">Editora</label>

                            <select name="fkeditora">
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

                            <!--select de Usuarios-->

                            <div class="form-content" method="get">
                                <label for="Editora">Nome do Usuário</label>

                                <select name="fkUsuario">
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

                                <div class="form-content">
                                    <label for="Datealuguel">Data do Aluguel</label>
                                    <input type="date" id="Datealuguel" name="Datealuguel" min="2023-11-10">

                                    
                                </div>


                                <div class="form-content">
                                    <label for="Datealuguel">Data de Devolução</label>
                                    <input type="date" id="Datealuguel" name="Datealuguel" min="2023-11-10">

                                  
                                </div>
                                <button type="submit" name="submit-usuario" id="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </main>

    <!--JS-->
    <script src="../JS/pesquisar.js"></script>
    <script src="../JS/modal.js"></script>
    <script src="../sidebar/sidebar.js"></script>
    <script src="../JS/alugueis.js"></script>

</body>

</html>