<?php

require_once("includes/verificaLogin.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Minha conta</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!--css-->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container d-flex justify-content-center align-items-center vh-100">

    <div class="card loginCadastro-card shadow">

        <div class="card-body p-5">

            <div class="text-center">

                <div class="logo-circle">
                    <img src="imagens/logo.png" alt="Logo Sistema de Pets" class="logo-icon">
                </div>

                <h2 class="fw-bold">Sistema de Pets</h2>

                <p class="text-muted mb-4">
                    Vizualize e edite seus dados cadastrais
                </p>

            </div>

            <form method="post" action="interface_principal.php">

                <div class="mb-3">

                    <label class="form-label">Nome</label>

                    <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-person"></i>
                    </span>

                        <input
                            type="text"
                            name="nome"
                            class="form-control">

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label">E-mail</label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-envelope"></i>
                        </span>

                        <input
                            type="email"
                            name="email"
                            class="form-control">

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label">Senha</label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-lock"></i>
                        </span>

                        <input
                            type="password"
                            name="senha"
                            id="senha"
                            class="form-control">

                        <button
                            class="btn btn-outline-secondary"
                            type="button"
                            id="mostrarSenha">

                            <i class="bi bi-eye"></i>

                        </button>

                    </div>

                </div>

                <a href="editarConta.php" class="btn-editarCadastro">
                    Editar
                </a>

                <button class="btn-excluirCadastro">
                    Excluir Conta
                </button>

                <div class="text-center mt-3">
                    <a href="interface_principal.php" class="cadastro-link">Voltar</a>
                </div>

            </form>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<!-- javaScript -->
<script src="js/script.js"></script>

</body>
</html>