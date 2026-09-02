<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit;
}

require "../conexao.php";

$id = (int) $_GET['id'];

$sql = "DELETE FROM produtos WHERE id=$id";

mysqli_query($conn, $sql);

header("Location: listar.php");
exit;
?>