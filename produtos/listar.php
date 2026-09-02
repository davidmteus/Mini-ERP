<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit;
}

require "../conexao.php";

$sql = "SELECT * FROM produtos";
$result = mysqli_query($conn, $sql);

$nome = $_SESSION['nome'] ?? 'Usuário';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Nexa Store</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

<div class="dashboard-layout">

    <aside class="dashboard-sidebar">

        <div class="dashboard-logo">
            NEXA <span>STORE</span>
        </div>

        <nav class="dashboard-menu">

            <a href="../dashboard.php">
                Dashboard
            </a>

            <a href="../usuarios/listar.php">
                Usuários
            </a>

            <a href="listar.php" class="menu-active">
                Produtos
            </a>

            <a href="../clientes/listar.php">
                Clientes
            </a>

            <a href="../vendas/listar.php">
                Vendas
            </a>

        </nav>

        <a href="../logout.php" class="menu-logout">
            Sair
        </a>

    </aside>


    <main class="dashboard-content">

        <header class="dashboard-header">

            <div>
                <p class="dashboard-label">GERENCIAMENTO</p>
                <h1>Produtos</h1>
            </div>

            <div class="dashboard-user">

                <div class="user-avatar">
                    <?php echo strtoupper(substr($nome, 0, 1)); ?>
                </div>

                <div>
                    <strong>
                        <?php echo htmlspecialchars($nome); ?>
                    </strong>

                    <span>
                        Usuário do sistema
                    </span>
                </div>

            </div>

        </header>


        <section class="page-panel">

            <div class="page-panel-header">

                <div>
                    <h2>Produtos cadastrados</h2>
                    <p>Gerencie os produtos disponíveis no sistema.</p>
                </div>

                <a href="cadastrar.php" class="primary-button">
                    Novo Produto
                </a>

            </div>


            <div class="table-wrapper">

                <table class="data-table">

                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Estoque</th>
                            <th>Preço</th>
                            <th>Categoria</th>
                            <th>Ações</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php while ($p = mysqli_fetch_assoc($result)) { ?>

                        <tr>

                            <td>
                                <?php echo $p['id']; ?>
                            </td>

                            <td>
                                <strong>
                                    <?php echo htmlspecialchars($p['nome']); ?>
                                </strong>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($p['descricao']); ?>
                            </td>

                            <td>
                                <?php echo $p['estoque']; ?>
                            </td>

                            <td>
                                R$ <?php echo number_format($p['preco'], 2, ',', '.'); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($p['categoria']); ?>
                            </td>

                            <td class="table-actions">

                                <a href="editar.php?id=<?php echo $p['id']; ?>" class="edit-button">
                                    Editar
                                </a>

                                <a href="excluir.php?id=<?php echo $p['id']; ?>" class="delete-button">
                                    Excluir
                                </a>

                            </td>

                        </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>

        </section>

    </main>

</div>

</body>
</html>