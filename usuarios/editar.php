<?php
require "../conexao.php";

$id = $_GET['id'];

$sql = "SELECT * FROM usuarios WHERE id=$id";
$result = mysqli_query($conn,$sql);
$u = mysqli_fetch_assoc($result);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

$nome = $_POST['nome'];
$email = $_POST['email'];
$tipo = $_POST['tipo'];

$sql = "UPDATE usuarios SET 
nome='$nome',
email='$email',
tipo='$tipo'
WHERE id=$id";

mysqli_query($conn,$sql);

header("Location: listar.php");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../style.css">
<title>Nexa Store - Editar Usuário</title>
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
                <h1>Editar Usuário</h1>
            </div>

            <a href="listar.php" class="secondary-button">
                Voltar
            </a>

        </div>

        <div class="form-panel">

            <form method="POST">

                <div class="form-grid">

                    <div class="input-group">
                        <label>Nome</label>

                        <input
                            type="text"
                            name="nome"
                            value="<?php echo htmlspecialchars($u['nome']); ?>"
                            required
                        >
                    </div>

                    <div class="input-group">
                        <label>E-mail</label>

                        <input
                            type="email"
                            name="email"
                            value="<?php echo htmlspecialchars($u['email']); ?>"
                            required
                        >
                    </div>

                    <div class="input-group">
                        <label>Tipo</label>

                        <input
                            type="text"
                            name="tipo"
                            value="<?php echo htmlspecialchars($u['tipo']); ?>"
                        >
                    </div>

                </div>

                <div class="form-actions">

                    <a href="listar.php" class="secondary-button">
                        Cancelar
                    </a>

                    <button type="submit" class="primary-button">
                        Salvar alterações
                    </button>

                </div>

            </form>

        </div>

    </main>

</div>

</body>
</html>