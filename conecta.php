<?php
	// Trecho de código movido do processa.php para cá
	// O objetivo é centralizar a conexão com o banco de dados em um único arqui e sempre que for necessário fazer uma conexão, basta incluir esse arquivo.

	// Tenta executar o código de conexão com o banco.
	// Caso ocorra algum erro durante a conexão, o bloco catch será executado.
	try {

		// Abre uma conexão com o banco de dados MySQL.
		//
		// Parâmetros do mysqli_connect:
		// 1º - endereço do servidor do banco de dados
		// 2º - usuário
		// 3º - senha
		// 4º - nome do banco de dados
		//
		// A função retorna um objeto de conexão que será utilizado
		// para executar consultas SQL.
		$conn = mysqli_connect("mysql", "root", "1234", "prog_internet");

	} catch (mysqli_sql_exception $e){

		// die() encerra imediatamente a execução do programa
		// e exibe a mensagem informada.
		die("Erro ao conectar com o banco de dados");
	}

?>
