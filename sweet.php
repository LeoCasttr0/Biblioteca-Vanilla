<?php
$dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);

if(empty($dados['Editora'])){
    $retorna = ['status' => false, 'msg' => "Erro: necessario preencher o campo nome da editora!"];
} else {
    $retorna = ['status' => true, 'msg' => "Nenhum Erro"];
} 

echo json_encode($retorna);
?>