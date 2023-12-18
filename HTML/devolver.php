<?php
// devolver.php

include_once('../config.php');

if (isset($_GET['idaluguel'])) {
    $idaluguel = $_GET['idaluguel'];

    // Aqui eu capturo as informações do aluguel com base no ID dele
    $sql = "SELECT * FROM alugueis WHERE idaluguel = '$idaluguel'";
    $result = $conexao->query($sql);

    // Recupera o ID do livro associado ao aluguel
    $sqlLivroID = "SELECT codelivros FROM alugueis WHERE idaluguel = '$idaluguel'";
    $resultLivroID = $conexao->query($sqlLivroID);

    if ($resultLivroID->num_rows > 0) {
        $row = $resultLivroID->fetch_assoc();
        $livroID = $row['codelivros'];

        // Atualiza o estoque do livro ao devolver
        $sqlUpdateEstoque = "UPDATE livros SET quantlivros = quantlivros + 1 WHERE idlivro = '$livroID'";
        $resultUpdateEstoque = $conexao->query($sqlUpdateEstoque);

        // Insira aqui a lógica para registrar a data de devolução no banco de dados
    }

    if ($result->num_rows > 0) {
        $aluguel_data = $result->fetch_assoc();

        // Verifique se a devolução já foi registrada
        if (empty($aluguel_data['datadevolu'])) {
            // A devolução ainda não foi registrada, então registre-a
            $dataDevolucao = date('Y-m-d');

            // Atualize o registro com a data de devolução
            $sqlUpdate = "UPDATE alugueis SET datadevolu = '$dataDevolucao' WHERE idaluguel = '$idaluguel'";
            $conexao->query($sqlUpdate);

            // Redirecione para a página de Aluguéis após devolver
            header("Location: Aluguel.php");
            exit();
        } else {
            // Se a devolução já foi registrada, você pode tratar de acordo com sua lógica
            echo "Livro já devolvido.";
        }
    }
}
?>