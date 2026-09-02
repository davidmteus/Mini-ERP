<?php

$host = "localhost";
$user = "root";
$senha = "";
$banco = "nome_do_banco";

$conn = mysqli_connect($host, $user, $senha, $banco);

if (!$conn) {
    echo "Erro na conexão";
}

?>