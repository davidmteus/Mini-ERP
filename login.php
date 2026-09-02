<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header("Location: dashboard.php");
    exit;
}

$erro = isset($_GET['erro']);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexa Store - Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="login-page">

    <div class="login-wrapper">

        <div class="login-left">
            <div class="brand">
                NEXA <span>STORE</span>
            </div>

            <div class="login-message">
                <h1>Gestão completa<br>para sua loja.</h1>

                <p>
                    Gerencie produtos, clientes, vendas e usuários
                    em um único sistema.
                </p>
            </div>
        </div>

        <div class="login-right">

            <div class="login-box">

                <div class="brand mobile-brand">
                    NEXA <span>STORE</span>
                </div>

                <h2>Acessar sistema</h2>

                <p class="subtitle">
                    Entre com seus dados para continuar.
                </p>

                <?php if ($erro): ?>
                    <div class="error-message">
                        E-mail ou senha incorretos.
                    </div>
                <?php endif; ?>

                <form action="verificar_login.php" method="POST">

                    <div class="form-group">
                        <label for="email">E-mail</label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Digite seu e-mail"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha</label>

                        <input
                            type="password"
                            id="senha"
                            name="senha"
                            placeholder="Digite sua senha"
                            required
                        >
                    </div>

                    <button type="submit">
                        Entrar
                    </button>

                </form>

            </div>

        </div>

    </div>

</body>
</html>