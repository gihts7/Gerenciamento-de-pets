<?php

require_once("includes/verificaLogin.php");
require_once("includes/conecta.php");


$sql = "SELECT pets.*, especies.especie
        FROM pets
        INNER JOIN especies
        ON pets.id_especie = especies.id";

$resultado = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gerenciamento de Pets</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container mt-5">

    <div class="pet-card">

        <a href="minhaConta.php" class="minha-conta" title="Minha conta">
            <i class="bi bi-person-circle"></i>
            <span>Minha Conta</span>
        </a>

        <div class="text-center">

            <div class="logo-circle">
                <img src="imagens/logo.png" alt="Logo Sistema de Pets" class="logo-icon">
            </div>

            <h1 class="titulo-pagina">
                Gerenciamento de Pets
            </h1>

            <p class="subtitulo">
                Gerencie todos os pets cadastrados
            </p>

        </div>

        <div class="d-flex justify-content-center gap-3 mb-5">

            <a href="formulário_pets.php" class="btn btn-loginCadastro">

                <i class="bi bi-plus-circle"></i>
                Cadastrar Novo Pet

            </a>

            <a href="gerenciarEspecies.php" class="btn btn-loginCadastro">

                <i class="bi bi-tags"></i>
                Gerenciar Espécies

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

                <?php

                while ($pet = mysqli_fetch_assoc($resultado)) {

                ?>

                    <tr>

                        <!-- NOME -->

                        <td>

                            <?php echo $pet["nome"]; ?>

                        </td>


                        <!-- ESPÉCIE -->

                        <td>

                            <?php echo $pet["especie"]; ?>

                        </td>


                        <!-- NASCIMENTO -->

                        <td>

                            <?php

                            echo date(
                                "d/m/Y",
                                strtotime($pet["nascimento"])
                            );

                            ?>

                        </td>


                        <!-- GÊNERO -->

                        <td>

                            <?php

                            if ($pet["genero"] == "M") {

                                echo "Macho";

                            } else {

                                echo "Fêmea";

                            }

                            ?>

                        </td>


                        <!-- AÇÕES -->

                        <td>

                            <a
                                href="editarPet.php?id=<?php echo $pet["id"]; ?>"
                                class="btn-editar">

                                Editar

                            </a>


                            <a
                                href="excluirPet.php?id=<?php echo $pet["id"]; ?>"
                                class="btn-excluir"
                                onclick="return confirm('Tem certeza que deseja excluir este pet?')">

                                Excluir

                            </a>

                        </td>

                    </tr>

                <?php

                }

                ?>

            </tbody>

        </table>

    </div>

</div>

</body>

</html>