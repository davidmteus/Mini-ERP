<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit;
}

require "../conexao.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
    $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $endereco = mysqli_real_escape_string($conn, $_POST['endereco']);

    $sql = "INSERT INTO clientes
            (nome, cpf, telefone, email, endereco)
            VALUES
            ('$nome', '$cpf', '$telefone', '$email', '$endereco')";

    if (mysqli_query($conn, $sql)) {
        header("Location: listar.php");
        exit;
    }

    $erro = "Erro ao cadastrar cliente.";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Cliente - Nexa Store</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

<div class="dashboard-layout">

    <aside class="dashboard-sidebar">

        <div class="dashboard-logo">
            NEXA <span>STORE</span>
        </div>

        <nav class="dashboard-menu">
            <a href="../dashboard.php">Dashboard</a>
            <a href="../usuarios/listar.php">Usuários</a>
            <a href="../produtos/listar.php">Produtos</a>
            <a href="listar.php" class="menu-active">Clientes</a>
            <a href="../vendas/listar.php">Vendas</a>
        </nav>

        <a href="../logout.php" class="menu-logout">Sair</a>

    </aside>

    <main class="dashboard-content">

        <header class="page-top">

            <div>
                <p class="dashboard-label">CLIENTES</p>
                <h1>Novo cliente</h1>
            </div>

            <a href="listar.php" class="secondary-button">
                Voltar
            </a>

        </header>

        <section class="form-panel">

            <?php if (isset($erro)) { ?>
                <div class="form-error">
                    <?php echo $erro; ?>
                </div>
            <?php } ?>

            <form method="POST">

                <div class="form-grid">

                    <div class="input-group">
                        <label>Nome</label>
                        <input type="text" name="nome" required>
                    </div>

                    <div class="input-group">
                        <label>CPF</label>
                        <input type="text" name="cpf">
                    </div>

                    <div class="input-group">
                        <label>Telefone</label>
                        <input type="text" name="telefone">
                    </div>

                    <div class="input-group">
                        <label>E-mail</label>
                        <input type="email" name="email">
                    </div>

                    <div class="input-group full">
                        <label>Endereço</label>
                        <input type="text" name="endereco">
                    </div>

                </div>

                <button type="submit" class="primary-button">
                    Cadastrar cliente
                </button>

            </form>

        </section>

    </main>

</div>

</body>
</html>