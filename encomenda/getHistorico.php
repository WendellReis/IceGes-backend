<?php
include 'conexao.php';
$json = json_decode(file_get_contents('php://input'));
$idSorveteria = $json->id;
$void = true;

$select = "SELECT idEncomenda, codigo, descricao, quantidade, dataFim FROM encomenda WHERE idSorveteria = '$idSorveteria' AND status = 0;";

$sel = $mysqli->query($select) or die($mysqli->error);

while($dado = $sel->fetch_array()){
    $void = false;
    $resp[] = $dado;
}

if($void){
    echo json_encode(false); 
} else{
    echo json_encode($resp);
}

