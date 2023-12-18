<?php
// Inicia a sessão
session_start();
include_once('../config.php');
// Imprime o conteúdo da sessão para depuração (pode ser removido em produção)

// Verifica se não existir uma sessão, redireciona para o login
if (!isset($_SESSION['admsistema']) || !isset($_SESSION['senhasistema'])) {
    // Limpa as sessões existentes (se houver) - isso pode ser ajustado conforme necessário
    unset($_SESSION['admsistema']);
    unset($_SESSION['senhasistema']);

    // Redireciona para a página de login
    header('Location: login-adm.php');
    exit(); // Certifique-se de encerrar a execução do script após o redirecionamento
}

// Se chegou até aqui, significa que as sessões estão definidas
$logado = $_SESSION['admsistema'];

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
    $Alugado = $_POST['Alug'];

    $result = mysqli_query($conexao, "INSERT INTO livros (nomelivro,autorlivro,codeeditora,quantlivros,quantalug) VALUES ('$Livro','$Autor','$ChaveEditora', '$Quantidade', '$Alugado')");
}

    // Consulta padrão se não houver pesquisa
$sql = "SELECT * FROM livros ORDER BY idlivro DESC";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--css-->
    <link rel="stylesheet" href="../CSS/dash.css">
    <link rel="stylesheet" href="../CSS/dashboardTabela.css">
    <link rel="stylesheet" href="../sidebar/sidebar.css">
    <!--icones-->
    <link rel="shortcut icon" type="imagex/png" href="../Imagens/biblioteca-fixpay-website-favicon-color_04_.ico">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!--Titulo-->
    <title>Dashboard</title>
</head>

<body>
    <!--sidebar-->
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
                        <a href="../HTML/Aluguel.php"><i class="bi bi-journal-check icon"></i>
                            <span class="text nav-text">Aluguéis</span>
                        </a>
                    </li>
                </ul>
                <!--logout-->
                <div class="bottom-content">
                    <li class="">
                        <a href="sair.php"><i class="bi bi-box-arrow-left icon"></i>
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

    <!--MENU RESPONSIVO-->
    <div class="header-responsive">
        <!--BOATO DE ABRIR O MENU-->
        <button class="button-mobile" onclick="iconMenu()">
            <i class="bi bi-list"></i>

            <!--LOGO BRANCA DO MENU-->
        </button>
        <img class="logo-white" src="../Imagens/biblioteca-fixpay-logo(white).png" alt="">
    </div>

    <!--A NAV EM SI-->
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
        <button class="mobile-link"> <i class="bi bi-box-arrow-left icon"></i> <a
                href="../HTML/login-adm.php">Logout</a></button>
        </span>
        </button>
    </nav>


    <!--Conteudo Principal da Dashboard-->
    <main>
        <div class="header-wrapper">
            <!--Cabeçalho Dashboard-->
            <div class="header-title">
                <h2>DASHBOARD <i class="fa-solid fa-square-poll-vertical"></i></h2>
            </div>
        </div>

        <!--Container Dos Cards -->
        <div class="card-container">
            <div class="card-title">
                <i class="fa-solid fa-circle-info icone"></i>
                <span class="card-text">Registros do Sistema</span>
            </div>

            <div class="card-wrapper">
                <!--CARD EDITORAS-->
                <div class="payment-card">
                    <div class="card-header">
                        <div class="amount">
                            <span class="title">
                                Total de Editoras </span>
                            <span class="amount-value">

                                <!--PHP VALOR DO CARD DE EDITORAS-->
                                <?php
                                include_once('../config.php');
                                $dash_card_query = "SELECT * from editoras";
                                $dash_card_query_run = mysqli_query($conexao, $dash_card_query);

                                if ($category_total = mysqli_num_rows($dash_card_query_run)) {
                                    echo $category_total;
                                }
                                ?>

                            </span>
                        </div>
                        <i class="fa-solid fa-book icone-card"></i>
                    </div>
                </div>

                <!--CARD USUARIOS-->
                <div class="payment-card">
                    <div class="card-header">
                        <div class="amount">
                            <span class="title">
                                Total de Usuários </span>
                            <span class="amount-value">

                                <!--PHP VALOR DO CARD DE USUARIOS-->
                                <?php
                                include_once('../config.php');
                                $dash_card_query = "SELECT * from usuarios";
                                $dash_card_query_run = mysqli_query($conexao, $dash_card_query);

                                if ($category_total = mysqli_num_rows($dash_card_query_run)) {
                                    echo $category_total;
                                }
                                ?>
                            </span>
                        </div>
                        <i class="fa-solid fa-book-open-reader icone-card"></i>
                    </div>

                    <!--CARD LIVROS-->
                </div>
                <div class="payment-card">
                    <div class="card-header">
                        <div class="amount">
                            <span class="title">
                                Total de Livros </span>
                            <span class="amount-value">

                                <!--PHP VALOR DO CARD DE LIVROS-->
                                <?php
                                include_once('../config.php');
                                $dash_card_query = "SELECT * from livros";
                                $dash_card_query_run = mysqli_query($conexao, $dash_card_query);

                                if ($category_total = mysqli_num_rows($dash_card_query_run)) {
                                    echo $category_total;
                                }
                                ?>
                            </span>
                        </div>
                        <i class="fa-solid fa-users icone-card"></i>
                    </div>
                </div>

                <!--CARD ALUGUEIS-->
                <div class="payment-card">
                    <div class="card-header">
                        <div class="amount">
                            <span class="title">
                                Total de Aluguéis </span>
                            <span class="amount-value">

                                <!--PHP VALOR DO CARD DE ALUGUEIS-->
                                <?php
                                include_once('../config.php');
                                $dash_card_query = "SELECT * from alugueis";
                                $dash_card_query_run = mysqli_query($conexao, $dash_card_query);

                                if ($category_total = mysqli_num_rows($dash_card_query_run)) {
                                    echo $category_total;
                                }
                                ?>
                            </span>
                        </div>
                        <i class="fa-solid fa-store icone-card"></i>
                    </div>
                </div>
            </div>
        </div>

        <!--CONTEUDOS TABELA E grafico-->
      <div class="table-container">
            <section class="header">
                 <div class="main-title"> NOVOS LIVROS </div>
                <div class="items-controller">
                    <h5>Mostrar</h5>
                    <select name="" id="itemperpage">
                        <option value="5">05</option>
                        <option value="10">10</option>
                        <option value="15">15</option>

                    </select>
                    <h5>Por Página</h5>
                </div>
                
            </section>
            <section class="field">
                <table class="table">
                    <thead>

                        <th>ID</th>
                        <th>Título do Livro</th>
                       
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
    </main>


    <!--JS da sidebar-->
    <script src="https://kit.fontawesome.com/f0d9a2c6e8.js" crossorigin="anonymous"></script>
    <script src="../sidebar/sidebar.js"></script>
   <script src="../JS/alugueis.js"></script>
 

</body>

</html>