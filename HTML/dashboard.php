<?php
// Inicia a sessão
session_start();

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

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--css-->
    <link rel="stylesheet" href="../CSS/dash.css">
    <link rel="stylesheet" href="../sidebar/sidebar.css">
    <!--icones-->
    <link rel="shortcut icon" type="imagex/png" href="../Imagens/biblioteca-fixpay-website-favicon-color_04_.ico">
    <script src="https://kit.fontawesome.com/f0d9a2c6e8.js" crossorigin="anonymous"></script>
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
        <button class="mobile-link"> <i class="bi bi-box-arrow-left icon"></i> <a
                href="../HTML/login-adm.php">Logout</a></button>
        </span>
        </button>
    </nav>


    <!--Conteudo principal da Dashboard-->
    <main>
        <div class="header-wrapper">
            <!--cabeçalho dashboard-->
            <div class="header-title">
                <h2>DASHBOARD <i class="fa-solid fa-square-poll-vertical"></i></h2>
            </div>
        </div>

        <!--Container dos cards -->
        <div class="card-container">
            <div class="card-title">
                <i class="fa-solid fa-circle-info icone"></i>
                <span class="card-text">Registros do Sistema</span>
            </div>

            <div class="card-wrapper">
                <!--Card livros-->
                <div class="payment-card">
                    <div class="card-header">
                        <div class="amount">
                            <span class="title">
                                Total de Livros </span>
                            <span class="amount-value">
                                5
                            </span>
                        </div>
                        <i class="fa-solid fa-book icone-card"></i>
                    </div>
                </div>

                <!--Card alugueis-->
                <div class="payment-card">
                    <div class="card-header">
                        <div class="amount">
                            <span class="title">
                                Total de Aluguéis </span>
                            <span class="amount-value">
                                5
                            </span>
                        </div>
                        <i class="fa-solid fa-book-open-reader icone-card"></i>
                    </div>

                    <!--Card usuarios-->
                </div>
                <div class="payment-card">
                    <div class="card-header">
                        <div class="amount">
                            <span class="title">
                                Total de Usuários </span>
                            <span class="amount-value">
                                5
                            </span>
                        </div>
                        <i class="fa-solid fa-users icone-card"></i>
                    </div>
                </div>

                <!--Card editoras-->
                <div class="payment-card">
                    <div class="card-header">
                        <div class="amount">
                            <span class="title">
                                Total de Editoras </span>
                            <span class="amount-value">
                                4
                            </span>
                        </div>
                        <i class="fa-solid fa-store icone-card"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="graphBox">
            <div class="box">
                <div class="title-graf">
                    <h2>Novos Usuários</h2>
                </div>

                <section class="field">
                    <table class="table">
                        <thead>
                            <th>Usuário</th>
                            <th> Data do Aluguel</th>
                        </thead>

                        <tbody>
                            <tr>
                                <td data-label="Usuário">Leonardo Castro</td>
                                <td data-label="Data do Aluguel">15/09</td>
                            </tr>
                            <tr>
                                <td data-label="Usuário">Sabrine Marques</td>
                                <td data-label="Data do Aluguel">10/09</td>
                            </tr>
                            <tr>
                                <td data-label="Usuário">Ronald Alves</td>
                                <td data-label="Data do Aluguel">01/09</td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </div>

            <div class="box">
                <div class="title-graf">
                    <h2>Livros Mais Alugados</h2>

                </div>

                <canvas id="grafico"></canvas>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    const ctx = document.getElementById('grafico').getContext('2d');

                    let Livros = ["Livro1", "Livro2", "Livro3"]
                    let Valores = [10, 20, 30]

                    new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: Livros,
                            datasets: [{
                                label: 'Total de Alugueis',
                                data: Valores,
                                backgroundColor: [
                                    'rgba(0,206,209)',
                                    'rgba(64,224,208)',
                                    'rgba(72,209,204)',

                                ]
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </main>

    <!--JS da sidebar-->
    <script src="../sidebar/sidebar.js"></script>
    <script src="../JS/Dashboard.js"></script>
    <!--script do js chart-->

</body>

</html>