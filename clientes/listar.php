<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit;
}

require "../conexao.php";

$result = mysqli_query($conn, "SELECT * FROM clientes");

$nome = $_SESSION['nome'] ?? 'Usuário';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - Nexa Store</title>
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

        <header class="dashboard-header">

            <div>
                <p class="dashboard-label">GERENCIAMENTO</p>
                <h1>Clientes</h1>
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

        <section class="page-panel">

            <div class="page-panel-header">

                <div>
                    <h2>Clientes cadastrados</h2>
                    <p>Gerencie os clientes da loja.</p>
                </div>

                <a href="cadastrar.php" class="primary-button">
                    Novo Cliente
                </a>

            </div>

            <div class="table-wrapper">

                <table class="data-table">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
                            <th>Endereço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php while ($c = mysqli_fetch_assoc($result)) { ?>

                        <tr>

                            <td><?php echo $c['id']; ?></td>

                            <td>
                                <strong>
                                    <?php echo htmlspecialchars($c['nome']); ?>
                                </strong>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($c['cpf']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($c['telefone']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($c['email']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($c['endereco']); ?>
                            </td>

                            <td class="table-actions">

                                <a
                                    href="editar.php?id=<?php echo $c['id']; ?>"
                                    class="edit-button">
                                    Editar
                                </a>

                                <a
                                    href="excluir.php?id=<?php echo $c['id']; ?>"
                                    class="delete-button">
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