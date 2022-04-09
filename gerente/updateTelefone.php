<?php
include "conexao.php";
$json = json_decode(file_get_contents('php://input'));

$cpf = $json->cpf;
$telefone = $json->telefone;

$consulta = "UPDATE gerente SET telefone = '$telefone' WHERE cpf = '$cpf'";

$con = $mysqli->query($consulta) or die($mysqli->error);

echo json_encode(true);