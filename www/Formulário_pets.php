<?php

require_once("includes/verificaLogin.php");

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

        <form method="post" action="interface_principal.php">

            <div class="row">

                <div class="col-md-6 mb-4">

                    <label class="form-label">Nome do Pet</label>

                    <input type="text" name="nome" required class="form-control">

                </div>

                <div class="col-md-6 mb-4">

                    <label class="form-label">Nascimento</label>

                    <input type="date" name="nascimento" required class="form-control">

                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-4">

                    <label class="form-label">Espécie</label>

                    <select name="especie" required class="form-select">

                        <option value="" selected disabled hidden>
                            Selecione a espécie
                        </option>

                        <option value="1">Cachorro</option>
                        <option value="2">Gato</option>
                        <option value="3">Pássaro</option>
                        <option value="4">Hamster</option>
                        <option value="5">Coelho</option>

                    </select>

                </div>

                <div class="col-md-6">

                    <label class="form-label">Gênero</label>

                    <div class="radio-group">

                        <div class="form-check">

                            <input class="form-check-input"
                                   type="radio"
                                   name="genero"  required
                                   value="F">

                            <label class="form-check-label">
                                Fêmea
                            </label>

                        </div>

                        <div class="form-check">

                            <input class="form-check-input"
                                   type="radio"
                                   name="genero" required
                                   value="M">

                            <label class="form-check-label">
                                Macho
                            </label>

                        </div>

                    </div>

                </div>

            </div>

            <div class="mb-4">

                <label class="form-label">Prontuário</label>

                <textarea
                    name="prontuario"
                    class="form-control"></textarea>

            </div>

            <div class="botoes">

                <button class="btn-salvar">
                    Salvar
                </button>

                <button type="reset" class="btn-limpar">
                    Limpar
                </button>

            </div>

        </form>

    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>