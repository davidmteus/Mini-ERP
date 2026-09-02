<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

require_once "conexao.php";

$usuarios = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM usuarios")
)['total'];

$produtos = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM produtos")
)['total'];

$clientes = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM clientes")
)['total'];

$vendas = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM vendas")
)['total'];

$nome = $_SESSION['nome'] ?? 'Usuário';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexa Store - Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="dashboard-layout">

    <aside class="dashboard-sidebar">

        <div class="dashboard-logo">
            NEXA <span>STORE</span>
        </div>

        <nav class="dashboard-menu">

            <a href="dashboard.php" class="menu-active">
                Dashboard
            </a>

            <a href="usuarios/listar.php">
                Usuários
            </a>

            <a href="produtos/listar.php">
                Produtos
            </a>

            <a href="clientes/listar.php">
                Clientes
            </a>

            <a href="vendas/listar.php">
                Vendas
            </a>

        </nav>

        <a href="logout.php" class="menu-logout">
            Sair
        </a>

    </aside>


    <main class="dashboard-content">

        <header class="dashboard-header">

            <div>
                <p class="dashboard-label">VISÃO GERAL</p>
                <h1>Dashboard</h1>
            </div>

            <div class="dashboard-user">
                <div class="user-avatar">
                    <?php echo strtoupper(substr($nome, 0, 1)); ?>
                </div>

                <div>
                    <strong><?php echo htmlspecialchars($nome); ?></strong>
                    <span>Usuário do sistema</span>
                </div>
            </div>

        </header>


        <section class="welcome-box">

            <div>
                <p class="dashboard-label">BEM-VINDO</p>

                <h2>
                    Olá, <?php echo htmlspecialchars($nome); ?>
                </h2>

                <p>
                    Acompanhe os principais dados do sistema.
                </p>
            </div>

        </section>


        <section class="dashboard-cards">

            <div class="dashboard-card">

                <div class="card-title">
                    Usuários
                </div>

                <div class="card-number">
                    <?php echo $usuarios; ?>
                </div>

                <div class="card-description">
                    Usuários cadastrados
                </div>

            </div>


            <div class="dashboard-card">

                <div class="card-title">
                    Produtos
                </div>

                <div class="card-number">
                    <?php echo $produtos; ?>
                </div>

                <div class="card-description">
                    Produtos cadastrados
                </div>

            </div>


            <div class="dashboard-card">

                <div class="card-title">
                    Clientes
                </div>

                <div class="card-number">
                    <?php echo $clientes; ?>
                </div>

                <div class="card-description">
                    Clientes cadastrados
                </div>

            </div>


            <div class="dashboard-card">

                <div class="card-title">
                    Vendas
                </div>

                <div class="card-number">
                    <?php echo $vendas; ?>
                </div>

                <div class="card-description">
                    Vendas registradas
                </div>

            </div>

        </section>


        <section class="dashboard-section">

            <div class="section-header">
                <p class="dashboard-label">GERENCIAMENTO</p>
                <h2>Acesso rápido</h2>
            </div>

            <div class="quick-actions">

                <a href="produtos/listar.php">
                    <strong>Produtos</strong>
                    <span>Gerenciar produtos</span>
                </a>

                <a href="clientes/listar.php">
                    <strong>Clientes</strong>
                    <span>Gerenciar clientes</span>
                </a>

                <a href="vendas/listar.php">
                    <strong>Vendas</strong>
                    <span>Consultar vendas</span>
                </a>

                <a href="usuarios/listar.php">
                    <strong>Usuários</strong>
                    <span>Gerenciar usuários</span>
                </a>

            </div>

        </section>

    </main>

</div>

</body>
</html>