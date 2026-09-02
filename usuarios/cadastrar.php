<?php
require "../conexao.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$tipo = $_POST['tipo'];

$sql = "INSERT INTO usuarios (nome,email,senha,tipo)
VALUES ('$nome','$email','$senha','$tipo')";

mysqli_query($conn,$sql);

header("Location: listar.php");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../style.css">
<title>Nexa Store - Novo Usuário</title>
</head>

<body>

<div class="dashboard-layout">

    <aside class="dashboard-sidebar">

        <div class="dashboard-logo">
            NEXA <span>STORE</span>
        </div>

        <nav class="dashboard-menu">

            <a href="../dashboard.php">Dashboard</a>
            <a href="listar.php" class="menu-active">Usuários</a>
            <a href="../produtos/listar.php">Produtos</a>
            <a href="../clientes/listar.php">Clientes</a>
            <a href="../vendas/listar.php">Vendas</a>

        </nav>

        <a href="../logout.php" class="menu-logout">Sair</a>

    </aside>

    <main class="dashboard-content">

        <div class="page-top">

            <div>
                <p class="dashboard-label">GERENCIAMENTO</p>
                <h1>Novo Usuário</h1>
            </div>

            <a href="listar.php" class="secondary-button">
                Voltar
            </a>

        </div>

        <div class="form-panel">

            <form method="POST">

                <div class="form-grid">

                    <div class="input-group">
                        <label>Nome</label>

                        <input
                            type="text"
                            name="nome"
                            placeholder="Nome do usuário"
                            required
                        >
                    </div>

                    <div class="input-group">
                        <label>E-mail</label>

                        <input
                            type="email"
                            name="email"
                            placeholder="E-mail do usuário"
                            required
                        >
                    </div>

                    <div class="input-group">
                        <label>Senha</label>

                        <input
                            type="password"
                            name="senha"
                            placeholder="Senha"
                            required
                        >
                    </div>

                    <div class="input-group">
                        <label>Tipo</label>

                        <input
                            type="text"
                            name="tipo"
                            placeholder="Tipo de usuário"
                        >
                    </div>

                </div>

                <div class="form-actions">

                    <a href="listar.php" class="secondary-button">
                        Cancelar
                    </a>

                    <button type="submit" class="primary-button">
                        Cadastrar usuário
                    </button>

                </div>

            </form>

        </div>

    </main>

</div>

</body>
</html>