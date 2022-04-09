<?php
include "conexao.php";
$json = json_decode(file_get_contents('php://input'));

$cpf = $json->cpf;

$consulta = "SELECT * FROM gerente WHERE cpf = '$cpf'";

$con = $mysqli->query($consulta) or die($mysqli->error);

while($dado = $con->fetch_array()){
    $resp = $dado["nome"];
}

echo json_encode($resp);