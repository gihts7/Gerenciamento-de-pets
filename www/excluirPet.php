<?php

require_once("includes/verificaLogin.php");
require_once("includes/conecta.php");


if (isset($_GET["id"])) {

    $id = $_GET["id"];


    $sql = "DELETE FROM pets
            WHERE id = '$id'";


    if (mysqli_query($conn, $sql)) {

        header("Location: interface_principal.php");
        exit;

    } else {

        echo "Erro ao excluir o pet.";

    }

} else {

    header("Location: interface_principal.php");
    exit;

}

?>