<?php
include 'conexao.php';
$json = json_decode(file_get_contents('php://input'));
$idCatalogo = $json->idCatalogo;
$categoria = $json->categoria;

$select = "SELECT * FROM produto WHERE idCatalogo='$idCatalogo' AND categoria='$categoria' ORDER BY codigo";

$sel = $mysqli->query($select) or die($mysqli->error);

while($dado = $sel->fetch_array()){
    $resp[] = $dado;
}

echo json_encode($resp);

