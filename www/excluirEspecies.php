<?php

require_once("includes/verificaLogin.php");
require_once("includes/conecta.php");


if (isset($_GET["id"])) {

    $id = $_GET["id"];


    $sql = "DELETE FROM especies 
            WHERE id = '$id'";


    if (mysqli_query($conn, $sql)) {

        header("Location: gerenciarEspecies.php");
        exit;

    } else {

        echo "Erro ao excluir a espécie.";

    }

} else {

    header("Location: gerenciarEspecies.php");
    exit;

}

?>