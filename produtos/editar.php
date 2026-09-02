<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit;
}

require "../conexao.php";

$id = (int) $_GET['id'];

$sql = "SELECT * FROM produtos WHERE id = $id";
$result = mysqli_query($conn, $sql);
$p = mysqli_fetch_assoc($result);

if (!$p) {
    header("Location: listar.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
    $estoque = (int) $_POST['estoque'];
    $preco = (float) $_POST['preco'];
    $categoria = mysqli_real_escape_string($conn, $_POST['categoria']);

    $sql = "UPDATE produtos SET
            nome='$nome',
            descricao='$descricao',
            estoque=$estoque,
            preco=$preco,
            categoria='$categoria'
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: listar.php");
        exit;
    }

    $erro = "Erro ao atualizar produto.";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto - Nexa Store</title>
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
            <a href="listar.php" class="menu-active">Produtos</a>
            <a href="../clientes/listar.php">Clientes</a>
            <a href="../vendas/listar.php">Vendas</a>

        </nav>

        <a href="../logout.php" class="menu-logout">
            Sair
        </a>

    </aside>


    <main class="dashboard-content">

        <header class="page-top">

            <div>
                <p class="dashboard-label">PRODUTOS</p>
                <h1>Editar produto</h1>
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
                            value="<?php echo htmlspecialchars($p['nome']); ?>"
                            required>
                    </div>

                    <div class="input-group">
                        <label>Categoria</label>
                        <input
                            type="text"
                            name="categoria"
                            value="<?php echo htmlspecialchars($p['categoria']); ?>">
                    </div>

                    <div class="input-group full">
                        <label>Descrição</label>
                        <input
                            type="text"
                            name="descricao"
                            value="<?php echo htmlspecialchars($p['descricao']); ?>">
                    </div>

                    <div class="input-group">
                        <label>Estoque</label>
                        <input
                            type="number"
                            name="estoque"
                            min="0"
                            value="<?php echo $p['estoque']; ?>"
                            required>
                    </div>

                    <div class="input-group">
                        <label>Preço</label>
                        <input
                            type="number"
                            name="preco"
                            step="0.01"
                            min="0"
                            value="<?php echo $p['preco']; ?>"
                            required>
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