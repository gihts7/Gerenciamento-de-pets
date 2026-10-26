<?php

require_once("includes/verificaLogin.php");
require_once("includes/conecta.php");

$id_usuario = (int) $_SESSION["id_usuario"];
$id_pet = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if (!$id_pet) {
    http_response_code(400);
    exit;
}

$sql = "SELECT foto, foto_tipo
        FROM pets
        WHERE id = ?
        AND id_usuario = ?
        AND foto IS NOT NULL";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "ii", $id_pet, $id_usuario);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);
$pet = mysqli_fetch_assoc($resultado);

if (!$pet) {
    http_response_code(404);
    exit;
}

header("Content-Type: " . $pet["foto_tipo"]);
header("X-Content-Type-Options: nosniff");

echo $pet["foto"];

mysqli_stmt_close($stmt);
mysqli_close($conn);
exit;