<?php

require_once("includes/verificaLogin.php");
require_once("includes/conecta.php");


/* BUSCAR ESPÉCIES */

$sql = "SELECT * FROM especies";

$resultado = mysqli_query($conn, $sql);


/* CADASTRAR PET */

/* CADASTRAR PET */

if (isset($_POST["enviar"])) {

    $nome = $_POST["nome"];
    $nascimento = $_POST["nascimento"];
    $id_especie = $_POST["especie"];
    $prontuario = $_POST["prontuario"];
    $genero = $_POST["genero"];

    // Pega o usuário que está logado
    $id_usuario = $_SESSION["id_usuario"];


    /* VALIDAR DATA DE NASCIMENTO */

    if ($nascimento > date("Y-m-d")) {

        $mensagem = "A data de nascimento não pode ser futura.";

    } else {


        $sql = "INSERT INTO pets 
                (nome, nascimento, id_especie, prontuario, genero, id_usuario)

                VALUES 
                ('$nome', '$nascimento', '$id_especie', '$prontuario', '$genero', '$id_usuario')";


        if (mysqli_query($conn, $sql)) {

            header("Location: interface_principal.php");
            exit;

        } else {

            $mensagem = "Erro ao cadastrar o pet.";

        }

    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">


</head>
<body>

    <div class="container">

    <div class="pet-card">

        <div class="logo-circle">
            <img src="imagens/logo.png" alt="Logo Sistema de Pets" class="logo-icon">
        </div>

        <h1 class="titulo-pagina">Cadastro de Pets</h1>

        <p class="subtitulo">
            Cadastre um novo pet no sistema
        </p>

        <form method="post">

            <!-- NOME -->

            <div class="mb-3">

                <label class="form-label">

                    Nome do Pet

                </label>

                <input
                    type="text"
                    name="nome"
                    class="form-control"
                    required>

            </div>


            <!-- NASCIMENTO -->

            <div class="mb-3">

                <label class="form-label">

                    Data de Nascimento

                </label>

                <input
                    type="date"
                    name="nascimento"
                    class="form-control"
                    max="<?php echo date('Y-m-d'); ?>"
                    required>

            </div>


            <!-- ESPÉCIE -->

            <div class="mb-3">

                <label class="form-label">

                    Espécie

                </label>

                <select
                    name="especie"
                    class="form-select"
                    required>

                    <option value="" selected disabled>

                        Selecione a espécie

                    </option>


                    <?php

                    while ($especie = mysqli_fetch_assoc($resultado)) {

                    ?>

                        <option value="<?php echo $especie["id"]; ?>">

                            <?php echo $especie["especie"]; ?>

                        </option>

                    <?php

                    }

                    ?>

                </select>

            </div>


            <!-- PRONTUÁRIO -->

            <div class="mb-3">

                <label class="form-label">

                    Prontuário

                </label>

                <textarea
                    name="prontuario"
                    class="form-control"
                    rows="4"></textarea>

            </div>


            <!-- GÊNERO -->

            <div class="mb-4">

                <label class="form-label d-block">

                    Gênero

                </label>


                <div class="form-check form-check-inline">

                    <input
                        class="form-check-input"
                        type="radio"
                        name="genero"
                        value="M"
                        required>

                    <label class="form-check-label">

                        Macho

                    </label>

                </div>


                <div class="form-check form-check-inline">

                    <input
                        class="form-check-input"
                        type="radio"
                        name="genero"
                        value="F">

                    <label class="form-check-label">

                        Fêmea

                    </label>

                </div>

            </div>


            <!-- MENSAGEM DE ERRO -->

            <?php if (isset($mensagem)) { ?>

                <div class="alert alert-danger">

                    <?php echo $mensagem; ?>

                </div>

            <?php } ?>


            <!-- BOTÃO SALVAR -->

            <input
                type="submit"
                name="enviar"
                value="Salvar"
                class="btn btn-loginCadastro w-100">


            <!-- VOLTAR -->

            <div class="text-center mt-3">

                <a
                    href="interface_principal.php"
                    class="cadastro-link">

                    Cancelar

                </a>

            </div>

        </form>

    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>