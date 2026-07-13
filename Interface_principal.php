<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pets cadastrados</title>
</head>

<body>

    <?php
	// arquivo processa.php
	// Este arquivo é responsável por receber e processar os dados enviados pelo formulário

	// Verifica se o formulário foi enviado (se o botão "enviar" existe no $_POST)
	// Caso não exista, significa que o usuário acessou a página diretamente,
	// então ele é redirecionado para o formulário (cad_aluno.php)
	if (!isset($_POST["enviar"]))
		header("location: Login.php");




</body>

</html>