<?php

require_once("includes/verificaLogin.php");
require_once("includes/conecta.php");


$id_usuario = $_SESSION["id_usuario"];


if (isset($_GET["id"])) {

    $id = $_GET["id"];


    $sql = "DELETE FROM pets
            WHERE id = '$id'
            AND id_usuario = '$id_usuario'";


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