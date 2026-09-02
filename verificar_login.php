<?php
session_start();
require 'conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){

$_SESSION['usuario'] = $email;

header("Location: dashboard.php");

}else{

echo "Login inválido";

}
?>
