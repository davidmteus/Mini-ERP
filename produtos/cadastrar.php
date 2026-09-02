<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit;
}

require "../conexao.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
    $estoque = (int) $_POST['estoque'];
    $preco = (float) $_POST['preco'];
    $categoria = mysqli_real_escape_string($conn, $_POST['categoria']);

    if (!empty($nome) && $estoque >= 0 && $preco >= 0) {

        $sql = "INSERT INTO produtos 
                (nome, descricao, estoque, preco, categoria)
                VALUES
                ('$nome', '$descricao', $estoque, $preco, '$categoria')";

        if (mysqli_query($conn, $sql)) {
            header("Location: listar.php");
            exit;
        }

        $erro = "Erro ao cadastrar produto.";
    } else {
        $erro = "Preencha os campos obrigatórios corretamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Produto - Nexa Store</title>
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
                <h1>Novo produto</h1>
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
                        <label>Categoria</label>
                        <input type="text" name="categoria">
                    </div>

                    <div class="input-group full">
                        <label>Descrição</label>
                        <input type="text" name="descricao">
                    </div>

                    <div class="input-group">
                        <label>Estoque</label>
                        <input type="number" name="estoque" min="0" required>
                    </div>

                    <div class="input-group">
                        <label>Preço</label>
                        <input type="number" name="preco" step="0.01" min="0" required>
                    </div>

                </div>

                <button type="submit" class="primary-button">
                    Cadastrar produto
                </button>

            </form>

        </section>

    </main>

</div>

</body>
</html>