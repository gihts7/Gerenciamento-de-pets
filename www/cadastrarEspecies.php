<?php

require_once("includes/verificaLogin.php");
require_once("includes/conecta.php");

if (isset($_POST["enviar"])) {

    $especie = trim($_POST["especie"]);

    $sql = "SELECT * FROM especies 
            WHERE LOWER(especie) = LOWER('$especie')";

    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {

        $mensagem = "Esta espécie já está cadastrada.";

    } else {

        $sql = "INSERT INTO especies (especie) 
                VALUES ('$especie')";

        if (mysqli_query($conn, $sql)) {

            header("Location: gerenciarEspecies.php");
            exit;

        } else {

            $mensagem = "Erro ao cadastrar a espécie.";

        }

    }

}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadastrar Espécie</title>


    <!-- Bootstrap -->

    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" 
        rel="stylesheet">


    <!-- Bootstrap Icons -->

    <link 
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">


    <!-- CSS -->

    <link rel="stylesheet" href="css/style.css">

</head>


<body>


<div class="container d-flex justify-content-center align-items-center vh-100">

    <div class="card loginCadastro-card shadow">

        <div class="card-body p-5">


            <!-- LOGO E TÍTULO -->

            <div class="text-center">

                <div class="logo-circle">

                    <img 
                        src="imagens/logo.png"
                        alt="Logo Sistema de Pets"
                        class="logo-icon">

                </div>


                <h2 class="fw-bold">

                    Cadastrar Espécie

                </h2>


                <p class="text-muted mb-4">

                    Cadastre uma nova espécie no sistema

                </p>

            </div>


            <!-- MENSAGEM DE ERRO -->

            <?php

            if (isset($mensagem)) {

            ?>

                <div class="alert alert-danger">

                    <?php echo $mensagem; ?>

                </div>

            <?php

            }

            ?>


            <!-- FORMULÁRIO -->

            <form method="post">


                <div class="mb-4">

                    <label class="form-label">

                        Nome da espécie

                    </label>


                    <div class="input-group">

                        <span class="input-group-text">

                            <i class="bi bi-tags"></i>

                        </span>


                        <input
                            type="text"
                            name="especie"
                            class="form-control"
                            placeholder="Ex: Cachorro"
                            required>

                    </div>

                </div>


                <!-- BOTÃO SALVAR -->

                <input
                    type="submit"
                    name="enviar"
                    value="Salvar"
                    class="btn btn-loginCadastro w-100">


                <!-- VOLTAR -->

                <div class="text-center mt-3">

                    <a 
                        href="gerenciarEspecies.php"
                        class="cadastro-link">

                        Cancelar

                    </a>

                </div>


            </form>

        </div>

    </div>

</div>


<script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js">
</script>


</body>

</html>