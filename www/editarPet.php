<?php

require_once("includes/verificaLogin.php");
require_once("includes/conecta.php");


/* VERIFICAR SE RECEBEU O ID */

if (!isset($_GET["id"])) {

    header("Location: interface_principal.php");
    exit;

}


$id = $_GET["id"];


/* BUSCAR AS ESPÉCIES */

$sqlEspecies = "SELECT * FROM especies";

$resultadoEspecies = mysqli_query($conn, $sqlEspecies);


/* BUSCAR O PET */

$sqlPet = "SELECT * FROM pets
           WHERE id = '$id'";

$resultadoPet = mysqli_query($conn, $sqlPet);

$pet = mysqli_fetch_assoc($resultadoPet);


/* SE O PET NÃO EXISTIR */

if (!$pet) {

    header("Location: interface_principal.php");
    exit;

}


/* SALVAR ALTERAÇÕES */

if (isset($_POST["enviar"])) {

    $nome = $_POST["nome"];
    $nascimento = $_POST["nascimento"];
    $id_especie = $_POST["especie"];
    $prontuario = $_POST["prontuario"];
    $genero = $_POST["genero"];


    $sql = "UPDATE pets
            SET

                nome = '$nome',
                nascimento = '$nascimento',
                id_especie = '$id_especie',
                prontuario = '$prontuario',
                genero = '$genero'

            WHERE id = '$id'";


    if (mysqli_query($conn, $sql)) {

        header("Location: interface_principal.php");
        exit;

    } else {

        $mensagem = "Erro ao editar o pet.";

    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Editar Pet</title>


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

                    Editar Pet

                </h2>


                <p class="text-muted mb-4">

                    Altere os dados do pet

                </p>

            </div>


            <!-- MENSAGEM DE ERRO -->

            <?php if (isset($mensagem)) { ?>

                <div class="alert alert-danger">

                    <?php echo $mensagem; ?>

                </div>

            <?php } ?>


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
                        value="<?php echo $pet["nome"]; ?>"
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
                        value="<?php echo $pet["nascimento"]; ?>"
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


                        <?php

                        while ($especie = mysqli_fetch_assoc($resultadoEspecies)) {

                        ?>

                            <option
                                value="<?php echo $especie["id"]; ?>"

                                <?php

                                if ($pet["id_especie"] == $especie["id"]) {

                                    echo "selected";

                                }

                                ?>

                            >

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
                        rows="4"><?php echo $pet["prontuario"]; ?></textarea>

                </div>


                <!-- GÊNERO -->

                <div class="mb-4">

                    <label class="form-label d-block">

                        Gênero

                    </label>


                    <!-- MACHO -->

                    <div class="form-check form-check-inline">

                        <input
                            class="form-check-input"
                            type="radio"
                            name="genero"
                            value="M"
                            required

                            <?php

                            if ($pet["genero"] == "M") {

                                echo "checked";

                            }

                            ?>

                        >

                        <label class="form-check-label">

                            Macho

                        </label>

                    </div>


                    <!-- FÊMEA -->

                    <div class="form-check form-check-inline">

                        <input
                            class="form-check-input"
                            type="radio"
                            name="genero"
                            value="F"

                            <?php

                            if ($pet["genero"] == "F") {

                                echo "checked";

                            }

                            ?>

                        >

                        <label class="form-check-label">

                            Fêmea

                        </label>

                    </div>

                </div>


                <!-- SALVAR -->

                <input
                    type="submit"
                    name="enviar"
                    value="Salvar Alterações"
                    class="btn btn-loginCadastro w-100">


                <!-- CANCELAR -->

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

</div>

</body>

</html>