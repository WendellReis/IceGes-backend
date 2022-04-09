<?php
include 'conexao.php';
$json = json_decode(file_get_contents('php://input'));
$idSorveteria = $json->idSorveteria;

$select = "SELECT idEncomenda, codigo, descricao, quantidade, dataInicio FROM encomenda WHERE idSorveteria = '$idSorveteria' AND status = 1;";

$sel = $mysqli->query($select) or die($mysqli->error);

while($dado = $sel->fetch_array()){
    $resp[] = $dado;
}

echo json_encode($resp);

