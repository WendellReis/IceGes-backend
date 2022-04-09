<?php
include "conexao.php";
$json = json_decode(file_get_contents('php://input'));

$cpf = $json->cpf;
$email = $json->email;

$consulta = "UPDATE gerente SET email = '$email' WHERE cpf = '$cpf'";

$con = $mysqli->query($consulta) or die($mysqli->error);

echo json_encode(true);