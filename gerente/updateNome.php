<?php
include "conexao.php";
$json = json_decode(file_get_contents('php://input'));

$cpf = $json->cpf;
$nome = $json->nome;

$consulta = "UPDATE gerente SET nome = '$nome' WHERE cpf = '$cpf'";

$con = $mysqli->query($consulta) or die($mysqli->error);

echo json_encode(true);