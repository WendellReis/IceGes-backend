<?php
include "conexao.php";
$json = json_decode(file_get_contents('php://input'));

$produto_existe = false;

$idSorveteria = $json->idSorveteria;
$codigo = $json->codigo;
$quantidade = $json->quantidade;

$consulta = "SELECT * produto WHERE codigo = '$codigo'";
$con = $mysqli->query($consulta) or die($mysqli->error);

while($dado = $con->fetch_array()){
    $desc = $dado["descricao"];
    $produto_existe = true;
}

if($produto_existe){
    $insert = "INSERT INTO encomenda(idSorveteria, codigo, descricao, quantidade, dataInicio, status) VALUES ($idSorveteria,$codigo,'$desc','$quantidade',NOW(),1);";
    $ins = $mysqli->query($insert) or die($mysqli->error);
}

echo json_encode($produto_existe);

