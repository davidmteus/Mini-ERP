<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit;
}

require "../conexao.php";

$id = (int) $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM clientes WHERE id=$id"
);

header("Location: listar.php");
exit;
?>