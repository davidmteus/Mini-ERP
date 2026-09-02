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
    "SELECT * FROM vendas WHERE id=$id"
);

$v = mysqli_fetch_assoc($result);

if (!$v) {
    header("Location: listar.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $cliente_id = (int) $_POST['cliente_id'];
    $produto_id = (int) $_POST['produto_id'];
    $quantidade = (int) $_POST['quantidade'];

    $produto = mysqli_query(
        $conn,
        "SELECT preco FROM produtos WHERE id=$produto_id"
    );

    $p = mysqli_fetch_assoc($produto);

    if ($p && $quantidade > 0) {

        $total = $p['preco'] * $quantidade;

        $sql = "UPDATE vendas SET
                cliente_id=$cliente_id,
                produto_id=$produto_id,
                quantidade=$quantidade,
                total=$total
                WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            header("Location: listar.php");
            exit;
        }
    }

    $erro = "Erro ao atualizar venda.";
}

$clientes = mysqli_query($conn, "SELECT id, nome FROM clientes");
$produtos = mysqli_query($conn, "SELECT id, nome, preco FROM produtos");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Venda - Nexa Store</title>
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
            <a href="../clientes/listar.php">Clientes</a>
            <a href="listar.php" class="menu-active">Vendas</a>
        </nav>

        <a href="../logout.php" class="menu-logout">Sair</a>

    </aside>

    <main class="dashboard-content">

        <header class="page-top">

            <div>
                <p class="dashboard-label">VENDAS</p>
                <h1>Editar venda</h1>
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

                        <label>Cliente</label>

                        <select name="cliente_id" required>

                            <?php while ($c = mysqli_fetch_assoc($clientes)) { ?>

                                <option
                                    value="<?php echo $c['id']; ?>"
                                    <?php if ($c['id'] == $v['cliente_id']) echo 'selected'; ?>>

                                    <?php echo htmlspecialchars($c['nome']); ?>

                                </option>

                            <?php } ?>

                        </select>

                    </div>


                    <div class="input-group">

                        <label>Produto</label>

                        <select name="produto_id" required>

                            <?php while ($p = mysqli_fetch_assoc($produtos)) { ?>

                                <option
                                    value="<?php echo $p['id']; ?>"
                                    <?php if ($p['id'] == $v['produto_id']) echo 'selected'; ?>>

                                    <?php echo htmlspecialchars($p['nome']); ?>
                                    — R$ <?php echo number_format($p['preco'], 2, ',', '.'); ?>

                                </option>

                            <?php } ?>

                        </select>

                    </div>


                    <div class="input-group">

                        <label>Quantidade</label>

                        <input
                            type="number"
                            name="quantidade"
                            min="1"
                            value="<?php echo $v['quantidade']; ?>"
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