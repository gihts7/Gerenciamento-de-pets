<?php

require_once("includes/verificaLogin.php");
require_once("includes/conecta.php");


$sql = "SELECT * FROM especies";

$resultado = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gerenciamento de Espécies</title>


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


<div class="container mt-5">

    <div class="pet-card">


        <!-- MINHA CONTA -->

        <a href="minhaConta.php" class="minha-conta">

            <i class="bi bi-person-circle"></i>

            <span>Minha Conta</span>

        </a>


        <!-- LOGO E TÍTULO -->

        <div class="text-center">

            <div class="logo-circle">

                <img 
                    src="imagens/logo.png"
                    alt="Logo Sistema de Pets"
                    class="logo-icon">

            </div>


            <h1 class="titulo-pagina">

                Gerenciamento de Espécies

            </h1>


            <p class="subtitulo">

                Gerencie as espécies cadastradas no sistema

            </p>

        </div>


        <!-- BOTÃO CADASTRAR -->

        <div class="text-center mb-5">

            <a 
                href="cadastrarEspecie.php"
                class="btn btn-loginCadastro">

                + Cadastrar Nova Espécie

            </a>

        </div>


        <!-- TÍTULO DA TABELA -->

        <h3 class="mb-4">

            Espécies cadastradas

        </h3>


        <!-- TABELA -->

        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Espécie</th>

                    <th>Ações</th>

                </tr>

            </thead>


            <tbody>


            <?php

            while ($especie = mysqli_fetch_assoc($resultado)) {

            ?>

                <tr>

                    <td>

                        <?php echo $especie["id"]; ?>

                    </td>


                    <td>

                        <?php echo $especie["especie"]; ?>

                    </td>


                    <td>


                        <!-- EDITAR -->

                        <a 
                            href="editarEspecie.php?id=<?php echo $especie["id"]; ?>"
                            class="btn-editar">

                            Editar

                        </a>


                        <!-- EXCLUIR -->

                        <a 
                            href="excluirEspecie.php?id=<?php echo $especie["id"]; ?>"
                            class="btn-excluir">

                            Excluir

                        </a>


                    </td>

                </tr>

            <?php

            }

            ?>


            </tbody>

        </table>


        <!-- VOLTAR -->

        <div class="text-center mt-4">

            <a 
                href="interface_principal.php"
                class="cadastro-link">

                Voltar

            </a>

        </div>


    </div>

</div>


<script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js">
</script>


</body>

</html>