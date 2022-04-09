<?php
include "conexao.php";
$json = json_decode(file_get_contents('php://input'));

$codigo = $json->codigo;
$qtd = $json->quantidade;
$antiga = 0;
$resp = false;

$q = "SELECT * FROM produto WHERE codigo = '$codigo'";
$qq = $mysqli->query($consulta) or die($mysqli->error);

while($dado = $qq->fetch_array()){
    $antiga = dado['qtdDisponivel'];
}

$consulta = "UPDATE produto SET qtdDisponivel = '$qtd WHERE codigo = '$codigo'";
$con = $mysqli->query($consulta) or die($mysqli->error);

if($antiga < $qtd){
    $r = $qtd - $antiga; 
    $update = "UPDATE produto SET qtdEstoque = qtdEstoque-'$r' WHERE codigo = '$codigo'";
    $up = $mysqli->query($update) or die($mysqli->error);
    $resp = true;
} else if($antiga > $qtd){
    $r =  $antiga - $qtd; 
    $update = "UPDATE produto SET qtdVendida = qtdVendida+'$r' WHERE codigo = '$codigo'";
    $up = $mysqli->query($update) or die($mysqli->error);
    $resp = true;
}
echo json_encode($resp);