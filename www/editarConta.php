<?php

require_once("includes/verificaLogin.php");
require_once("includes/conecta.php");

$id_usuario = $_SESSION["id_usuario"];

/*SALVAR AS ALTERAÇÕES*/

if (isset($_POST["enviar"])) {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    if (!empty($senha)) {

        $senha = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "UPDATE usuarios 
                SET nome = '$nome',
                    email = '$email',
                    senha = '$senha'
                WHERE id = '$id_usuario'";

    } else {

        $sql = "UPDATE usuarios 
                SET nome = '$nome',
                    email = '$email'
                WHERE id = '$id_usuario'";

    }

    if (mysqli_query($conn, $sql)) {

        header("Location: minhaConta.php");
        exit;

    } else {

        $mensagem = "Erro ao atualizar os dados.";

    }

}

/* BUSCAR OS DADOS ATUAIS DO USUÁRIO*/

$sql = "SELECT * FROM usuarios 
        WHERE id = '$id_usuario'";

$resultado = mysqli_query($conn, $sql);

$usuario = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Editar cadastro</title>

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
                    Altere seus dados cadastrais
                </p>

            </div>

            <?php

            if (isset($mensagem)) {

            ?>

                <div class="alert alert-danger">

                    <?php echo $mensagem; ?>

                </div>

            <?php

            }

            ?>

            <form method="post" action="">

                <div class="mb-3">

                    <label class="form-label">Nome</label>

                    <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-person"></i>
                    </span>

                        <input
                            type="text"
                            name="nome"
                            class="form-control"
                            value="<?php echo $usuario["nome"]; ?>"
                            required>

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
                            class="form-control"
                            value="<?php echo $usuario["email"]; ?>"
                            required>

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label">Nova senha</label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-lock"></i>
                        </span>

                        <input 
                            type="password" 
                            name="senha" 
                            id="senha" 
                            class="form-control"
                            placeholder="Deixe em branco para manter a senha atual">

                        <button 
                            class="btn btn-outline-secondary" 
                            type="button" 
                            id="mostrarSenha">

                            <i class="bi bi-eye"></i>

                        </button>

                    </div>

                </div>

                <input
                    type="submit"
                    name="enviar"
                    value="Salvar Alterações"
                    class="btn btn-loginCadastro w-100">

                <div class="text-center mt-3">

                    <a 
                        href="minhaConta.php"
                        class="cadastro-link">

                        Cancelar

                    </a>

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