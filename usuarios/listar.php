<?php
require "../conexao.php";

$sql = "SELECT * FROM usuarios";
$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../style.css">
<title>Nexa Store - Usuários</title>
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
                <h1>Usuários</h1>
            </div>

            <a href="cadastrar.php" class="primary-button">
                Novo Usuário
            </a>

        </div>

        <div class="page-panel">

            <div class="page-panel-header">

                <div>
                    <p class="dashboard-label">CADASTRADOS</p>
                    <h2>Usuários do sistema</h2>
                </div>

            </div>

            <div class="table-wrapper">

                <table class="data-table">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Tipo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php while($u = mysqli_fetch_assoc($result)){ ?>

                        <tr>

                            <td><?php echo $u['id']; ?></td>

                            <td>
                                <?php echo htmlspecialchars($u['nome']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($u['email']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($u['tipo']); ?>
                            </td>

                            <td class="table-actions">

                                <a
                                    href="editar.php?id=<?php echo $u['id']; ?>"
                                    class="edit-button"
                                >
                                    Editar
                                </a>

                                <a
                                    href="excluir.php?id=<?php echo $u['id']; ?>"
                                    class="delete-button"
                                >
                                    Excluir
                                </a>

                            </td>

                        </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </main>

</div>

</body>
</html>