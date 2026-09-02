<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit;
}

require "../conexao.php";

$id = (int) $_GET['id'];

$result = mysqli_query(
    $conn,
    "SELECT * FROM clientes WHERE id = $id"
);

$c = mysqli_fetch_assoc($result);

if (!$c) {
    header("Location: listar.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
    $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $endereco = mysqli_real_escape_string($conn, $_POST['endereco']);

    $sql = "UPDATE clientes SET
            nome='$nome',
            cpf='$cpf',
            telefone='$telefone',
            email='$email',
            endereco='$endereco'
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: listar.php");
        exit;
    }

    $erro = "Erro ao atualizar cliente.";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente - Nexa Store</title>
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
                <h1>Editar cliente</h1>
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
                        <input
                            type="text"
                            name="nome"
                            value="<?php echo htmlspecialchars($c['nome']); ?>"
                            required>
                    </div>

                    <div class="input-group">
                        <label>CPF</label>
                        <input
                            type="text"
                            name="cpf"
                            value="<?php echo htmlspecialchars($c['cpf']); ?>">
                    </div>

                    <div class="input-group">
                        <label>Telefone</label>
                        <input
                            type="text"
                            name="telefone"
                            value="<?php echo htmlspecialchars($c['telefone']); ?>">
                    </div>

                    <div class="input-group">
                        <label>E-mail</label>
                        <input
                            type="email"
                            name="email"
                            value="<?php echo htmlspecialchars($c['email']); ?>">
                    </div>

                    <div class="input-group full">
                        <label>Endereço</label>
                        <input
                            type="text"
                            name="endereco"
                            value="<?php echo htmlspecialchars($c['endereco']); ?>">
                    </div>

                </div>

                <button type="submit" class="primary-button">
                    Salvar alterações
                </button>

            </form>

        </section>

    </main>

</div>

</body>
</html>