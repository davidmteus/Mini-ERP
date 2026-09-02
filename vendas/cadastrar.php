<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit;
}

require "../conexao.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $cliente_id = (int) $_POST['cliente_id'];
    $produto_id = (int) $_POST['produto_id'];
    $quantidade = (int) $_POST['quantidade'];

    $produto = mysqli_query(
        $conn,
        "SELECT preco, estoque FROM produtos WHERE id=$produto_id"
    );

    $p = mysqli_fetch_assoc($produto);

    if (!$p) {
        $erro = "Produto não encontrado.";
    } elseif ($quantidade <= 0) {
        $erro = "Informe uma quantidade válida.";
    } elseif ($quantidade > $p['estoque']) {
        $erro = "Quantidade maior que o estoque disponível.";
    } else {

        $total = $p['preco'] * $quantidade;

        $sql = "INSERT INTO vendas
                (cliente_id, produto_id, quantidade, total)
                VALUES
                ($cliente_id, $produto_id, $quantidade, $total)";

        if (mysqli_query($conn, $sql)) {

            mysqli_query(
                $conn,
                "UPDATE produtos
                 SET estoque = estoque - $quantidade
                 WHERE id=$produto_id"
            );

            header("Location: listar.php");
            exit;
        }

        $erro = "Erro ao registrar venda.";
    }
}

$clientes = mysqli_query($conn, "SELECT id, nome FROM clientes");
$produtos = mysqli_query($conn, "SELECT id, nome, preco, estoque FROM produtos");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Venda - Nexa Store</title>
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
                <h1>Nova venda</h1>
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

                            <option value="">Selecione um cliente</option>

                            <?php while ($c = mysqli_fetch_assoc($clientes)) { ?>

                                <option value="<?php echo $c['id']; ?>">
                                    <?php echo htmlspecialchars($c['nome']); ?>
                                </option>

                            <?php } ?>

                        </select>

                    </div>


                    <div class="input-group">

                        <label>Produto</label>

                        <select name="produto_id" required>

                            <option value="">Selecione um produto</option>

                            <?php while ($p = mysqli_fetch_assoc($produtos)) { ?>

                                <option value="<?php echo $p['id']; ?>">
                                    <?php echo htmlspecialchars($p['nome']); ?>
                                    — R$ <?php echo number_format($p['preco'], 2, ',', '.'); ?>
                                    — Estoque: <?php echo $p['estoque']; ?>
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
                            required>

                    </div>

                </div>

                <button type="submit" class="primary-button">
                    Registrar venda
                </button>

            </form>

        </section>

    </main>

</div>

</body>
</html>