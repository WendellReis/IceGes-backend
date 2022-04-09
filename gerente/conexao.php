<?php
    $hostname = "localhost";
    $banco = "iceges";
    $usuario = "root";
    $senha = "";

    $mysqli = new mysqli($hostname,$usuario,$senha,$banco);

    if($mysqli->connect_errno){
        echo "Falga ao conectar: (".$mysqli->connect_errno. ") ".$mysqli->connect_error;
    }