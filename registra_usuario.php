<?php

	require_once('db.class.php');

	$usuario = $_POST['usuario'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];	

	$objDB = new db();
	$link = $objDB->conecta_mysql();

	$sql = " INSERT INTO usuarios(usuario, email, senha) values ('$usuario', '$email', '$senha')";

	//executar a query => a função mysqli_query() espera 2 parâmetros: conexão e a query
	if (mysqli_query($link,$sql)){
		echo 'Usuário registrado com sucesso';
	} else {
		echo 'Erro ao registrar o usuário';
	}

?>
