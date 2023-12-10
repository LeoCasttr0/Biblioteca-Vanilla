<?php
//Aqui ele vai verificar o forms que tem o metodo post de o elemento que tem o name submit-editora

//caminho do config php (local onde esta nosso banco de dados)
include_once('../config.php');

if (isset($_POST['submit-livros'])) {

    // print_r('Nome do Livro: '.$_POST['Livro']);
    // print_r('<br>');
    // print_r('Autor do Livro: '.$_POST['Autor']);
    // print_r('<br>');
    // print_r('Quantidade de Livro: '.$_POST['Quanti']);

    $Livro = $_POST['Livro'];
    $Autor = $_POST['Autor'];
    $ChaveEditora = $_POST['fkeditora'];
    $Quantidade = $_POST['Quanti'];

    $result = mysqli_query($conexao, "INSERT INTO livros (nomelivro,autorlivro,codeeditora,quantlivros) VALUES ('$Livro','$Autor','$ChaveEditora', '$Quantidade')");
}

$sql = "SELECT * FROM livros ORDER BY idlivro DESC";
$result = $conexao->query($sql);

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Titulo-->
    <title>Livros</title>
    <!--CSS--->
    <link rel="stylesheet" href="../CSS/livro.css">
    <link rel="stylesheet" href="../sidebar/sidebar.css">
    <!--ICONES--->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!--IMAGEM DE CIMA--->
    <link rel="shortcut icon" type="imagex/png" href="../Imagens/biblioteca-fixpay-website-favicon-color_04_.ico">
    <!--SWEET ALERT--->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>



    <!--SIDEBAR-->
    <nav class="sidebar close">
        <header>
            <!--logo da sidebar-->
            <div class="image-text">
                <span class="image">
                    <img src="../Imagens/biblioteca-fixpay-website-favicon-color_04_.ico" alt="logo">
                </span>
                <!--nome fixpay  da sidebar-->
                <div class="text header-text">
                    <span class="name">Biblioteca </span>
                    <span class="profession">Fixpay</span>
                </div>
            </div>
            <i class="bi bi-caret-right-fill toggle"></i>

        </header>
        <!--links da sidebar-->
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
                        <a href="../HTML/Alugueis.php"><i class="bi bi-journal-check icon"></i>
                            <span class="text nav-text">Aluguéis</span>
                        </a>
                    </li>
                </ul>


                <!--logout-->
                <div class="bottom-content">
                    <li class="">
                        <a href="../HTML/login-adm.php"><i class="bi bi-box-arrow-left icon"></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>

                    <!--modo escuro-->
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
                        href="../HTML/Alugueis.php">Aluguéis</a></button>
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
    <!-- final do menu responsivo-->
    <!-- Main de alugueis-->
    <main>
        <div class="table-container">
            <div class="main-title">LIVROS
                <!--botao do modal-->
                <button class="open-modal-button"><i class="bi bi-plus-circle-fill add-icone"></i> </button>
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
                        <th>Nome</th>
                        <th>Autor</th>
                        <th>Editora</th>
                        <th>Quantidade</th>
                        <th>Total Alugado</th>
                        <th>Ações</th>
                    </thead>

                    <tbody>
                        <?php
                        while ($user_data = mysqli_fetch_assoc($result)) {
                            $ideditora = $user_data['codeeditora'];
                            $sqleditora = "select * from editoras where id = '$ideditora' ";
                            $resulteditora = $conexao->query($sqleditora);

                            $editora_data = mysqli_fetch_assoc($resulteditora);
                            echo "<tr>";
                            echo "<td data-label='ID'>" . $user_data['idlivro'] . "</td>";

                            echo "<td  data-label='Livro'>" . $user_data['nomelivro'] . "</td>";
                            echo "<td  data-label='Autor'>" . $user_data['autorlivro'] . "</td>";
                            echo "<td  data-label='Editora'>" . $editora_data['nomeeditora'] . "</td>";
                            echo "<td  data-label='Quantidade'>" . $user_data['quantlivros'] . "</td>";
                            echo "<td  data-label='Ações'>

                            <a href='editUsuario.php?iduser=$user_data[idlivro]'>
                            <i class='edit bi bi-pencil-fill'></i>
                        </a>
 
                        <a href='deleteUsuarios.php?iduser=$user_data[idlivro]'>
                        <i class='trash bi bi-trash3-fill'></i>
                        </a>
                        
                </td>";
                            echo "</tr>"; // Fechamento da linha para cada registro
                        
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
                    <h2>Cadastre Aqui</h2>
                </section>

                <!--corpo do form-->
                <form id="form " action="livros.php" method="POST" class="form">

                    <div class="form-content">
                        <label for="Livro">Nome do Livro</label>
                        <input type="text" id="Livro" name="Livro" placeholder="Digite o Nome do Livro">
                        <!--modal-->
                        <a>Deu erroooo</a>
                    </div>

                    <div class="form-content">
                        <label for="Autor">Autor do Livro</label>
                        <input type="text" id="Autor" name="Autor" placeholder="Digite o Autor deste Livro">
                        <!--modal-->
                        <a>Deu erroooo</a>
                    </div>


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

                        <!--modal-->
                        <a>Deu erroooo</a>
                    </div>

                    <div class="form-content">
                        <label for="Quantidade">Quantidade do Livro</label>
                        <input type="number" id="Quanti" name="Quanti" placeholder="Digite quantidade de exemplares ">

                        <!--modal-->
                        <a>Deu erroooo</a>
                    </div>


                    <button type="submit" name="submit-livros" id="submit">Cadastrar</button>
                </form>

            </div>
        </div>

    </main>
    <!--JS-->
    <script src="../JS/modal.js"></script>
    <script src="../sidebar/sidebar.js"></script>
    <script src="../JS/alugueis.js"></script>

</body>

</html>