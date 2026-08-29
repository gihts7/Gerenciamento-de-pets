<?php

require_once("includes/verificaLogin.php");
require_once("includes/conecta.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_usuario = $_SESSION["id_usuario"];

    $sql = "DELETE FROM usuarios 
            WHERE id = '$id_usuario'";

    if (mysqli_query($conn, $sql)) {

        session_destroy();

        header("Location: index.php");
        exit;

    } else {

        echo "Erro ao excluir a conta.";

    }

} else {

    header("Location: minhaConta.php");
    exit;

}

?>