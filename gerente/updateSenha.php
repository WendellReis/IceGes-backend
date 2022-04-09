<?php
include 'conexao.php';
$json = json_decode(file_get_contents('php://input'));

$cpf = $json->cpf;
$atual = $json->atual;
$senha = $json->senha;
$resp = false;

$consulta = "SELECT * FROM gerente WHERE cpf = '$cpf' AND senha = '$atual'";

$con = $mysqli->query($consulta) or die($mysqli->error);

while($dado = $con->fetch_array()){
    $resp = $dado["senha"];
}

if($resp == $atual){
    $alter = "UPDATE gerente SET senha= '$senha' WHERE cpf = '$cpf'";
    $alt = $mysqli->query($alter) or die($mysqli->error);
    echo json_encode(true);
} else{
    echo json_encode(false);
}