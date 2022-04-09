<?php
include 'conexao.php';
$json = json_decode(file_get_contents('php://input'));

$idEncomenda = $json->idEncomenda;
$codigo = $json->codigo;
$quantidade = $json->quantidade;

$consulta = "UPDATE encomenda SET status = 0 WHERE idEncomenda = '$idEncomenda'";
$con = $mysqli->query($consulta) or die($mysqli->error);

$alterProduto = "UPDATE produto SET qtdEstoque = qtdEstoque + $quantidade WHERE codigo = '$codigo'";
$queryAlterProduto = $mysqli->query($alterProduto) or die($mysqli->error);

echo json_encode(true);