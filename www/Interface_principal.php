<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gerenciamento de Pets</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php

//if (!isset($_POST["enviar"]))
    //header("location: Login.php");
?>

<div class="container mt-5">

    <div class="pet-card">

        <div class="text-center">

            <div class="logo-circle">
                <img src="Imagens/Logo.png" alt="Logo Sistema de Pets" class="logo-icon">
            </div>

            <h1 class="titulo-pagina">
                Gerenciamento de Pets
            </h1>

            <p class="subtitulo">
                Gerencie todos os pets cadastrados
            </p>

        </div>

        <div class="text-center mb-5">

            <a href="Formulário_pets.php" class="btn btn-loginCadastro">

                + Cadastrar Novo Pet

            </a>

        </div>

        <h3 class="mb-4">
            Pets cadastrados
        </h3>

        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th>Nome</th>
                    <th>Espécie</th>
                    <th>Nascimento</th>
                    <th>Gênero</th>
                    <th>Ações</th>

                </tr>

            </thead>

            <tbody>

                <tr>

                    <td>Bob</td>
                    <td>Cachorro</td>
                    <td>10/02/2022</td>
                    <td>Macho</td>
                    <td>

                        <button class="btn-editar">
                            Editar
                        </button>

                        <button class="btn-excluir">
                            Excluir
                        </button>

                    </td>

                </tr>

                <tr>

                    <td>Luna</td>
                    <td>Gato</td>
                    <td>15/07/2021</td>
                    <td>Fêmea</td>
                    <td>

                        <button class="btn-editar">
                            Editar
                        </button>

                        <button class="btn-excluir">
                            Excluir
                        </button>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>

</body>

</html>