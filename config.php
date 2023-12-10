<!--AQUI FICARÁ A CONEXÃO COM O BANCO DE DADOS-->


<?php

$dbHost = 'Localhost';
$dbHUsername = 'root';
$dbPassword = '';
$dbName = 'projetolivraria';


$conexao = new mysqli($dbHost,$dbHUsername,$dbPassword, $dbName);

/*UM CONDICIONAL PARA TESTAR A CONEXAO */

//if($conexao -> connect_errno)
//{
  // echo "erro";
//}

 //else {
 // echo"conexao efetuada com sucesso";
//}

?>