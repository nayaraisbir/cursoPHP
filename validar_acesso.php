<?php
	
	session_start(); //usar sempre como o primeiro comando 

	require_once('db.class.php');
	
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];

	$sql = " SELECT usuario, email FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' ";

	$objDB = new db();
	$link = $objDB->conecta_mysql();
	
	//executar a query => a função mysqli_query() espera 2 parâmetros: conexão e a query
	$resultado_id = (mysqli_query($link,$sql)); //Retorna false caso exista um erro na consulta ou um resource
	
	if($resultado_id){
		$dados_usuario = mysqli_fetch_array($resultado_id);	
		//var_dump($dados_usuario);

		if(isset($dados_usuario['usuario'])){
			//echo "usuário existe";

			$_SESSION['usuario'] = $dados_usuario['usuario'];
			$_SESSION['email'] = $dados_usuario['email'];

			header('Location: home.php');
		} else {
			//echo 'usuário não existe';
			header('Location: index.php?erro=1');
		}

	} else {
		echo 'Erro na execução da consulta, favor entrar em contato com o admin.';
	}

	//update => retorna true/false
	//insert => retorna true/false
	//select => false/resource
	//delete => retorna true/false
	
?>
