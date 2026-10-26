<?php

require_once("includes/verificaLogin.php");
require_once("includes/conecta.php");


/* BUSCAR ESPÉCIES */

$sql = "SELECT * FROM especies";

$resultado = mysqli_query($conn, $sql);


/* CADASTRAR PET */

/* CADASTRAR PET */

/* CADASTRAR PET */

if (isset($_POST["enviar"])) {

    $nome = trim($_POST["nome"]);
    $nascimento = $_POST["nascimento"];
    $id_especie = (int) $_POST["especie"];
    $prontuario = trim($_POST["prontuario"]);
    $genero = $_POST["genero"];
    $id_usuario = (int) $_SESSION["id_usuario"];

    $foto = null;
    $foto_tipo = null;
    $foto_nome = null;

    /* VALIDAR DATA */

    $data_minima = "1900-01-01";
    $data_atual = date("Y-m-d");

    $data = DateTime::createFromFormat("Y-m-d", $nascimento);

    if (
        !$data ||
        $data->format("Y-m-d") !== $nascimento
    ) {
        $mensagem = "Digite uma data de nascimento válida.";
    } elseif ($nascimento < $data_minima) {
        $mensagem = "A data não pode ser anterior a 1900.";
    } elseif ($nascimento > $data_atual) {
        $mensagem = "A data não pode ser futura.";
    }

    /* VALIDAR FOTO, SE FOI SELECIONADA */

    if (!isset($mensagem) &&
        isset($_FILES["foto"]) &&
        $_FILES["foto"]["error"] !== UPLOAD_ERR_NO_FILE) {

        if ($_FILES["foto"]["error"] !== UPLOAD_ERR_OK) {
            $mensagem = "Ocorreu um erro ao enviar a foto.";
        } elseif ($_FILES["foto"]["size"] > 2 * 1024 * 1024) {
            $mensagem = "A foto deve ter no máximo 2 MB.";
        } else {
            $arquivo_temporario = $_FILES["foto"]["tmp_name"];

            /* Verifica o tipo real do arquivo */
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $tipo = $finfo->file($arquivo_temporario);

            $tipos_permitidos = [
                "image/jpeg",
                "image/png",
                "image/webp"
            ];

            if (!in_array($tipo, $tipos_permitidos, true)) {
                $mensagem = "Envie uma imagem JPG, PNG ou WEBP.";
            } else {
                $conteudo = file_get_contents($arquivo_temporario);

                if ($conteudo === false) {
                    $mensagem = "Não foi possível ler a imagem.";
                } else {
                    $foto = $conteudo;
                    $foto_tipo = $tipo;

                    /* Guarda somente o nome original */
                    $foto_nome = basename($_FILES["foto"]["name"]);
                }
            }
        }
    }

    /* CADASTRAR PET */

    if (!isset($mensagem)) {

        $sql = "INSERT INTO pets
                (nome, nascimento, id_especie, prontuario,
                 genero, id_usuario, foto, foto_tipo, foto_nome)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            "ssississs",
            $nome,
            $nascimento,
            $id_especie,
            $prontuario,
            $genero,
            $id_usuario,
            $foto,
            $foto_tipo,
            $foto_nome
        );

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);

            header("Location: Interface_principal.php");
            exit;
        } else {
            $mensagem = "Erro ao cadastrar o pet.";
        }

        if (isset($stmt) && $stmt instanceof mysqli_stmt) {
            mysqli_stmt_close($stmt);
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

        <form method="post" enctype="multipart/form-data">

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
                    min="1900-01-01"
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

            <!-- FOTO DO PET -->

            <div class="mb-3">
                <label class="form-label">Foto do Pet</label>

                <input
                    type="file"
                    name="foto"
                    class="form-control"
                    accept="image/jpeg,image/png,image/webp">

                <small class="text-muted">
                    Formatos: JPG, PNG ou WEBP. Máximo: 2 MB.
                </small>
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