<?php

	require_once('db.class.php');
	
	$sql = " SELECT * FROM usuarios ";

	$objDB = new db();
	$link = $objDB->conecta_mysql();
	
	//executar a query => a função mysqli_query() espera 2 parÃ¢metros: conexÃ£o e a query
	$resultado_id = (mysqli_query($link,$sql)); //Retorna false caso exista um erro na consulta ou um resource
	
	if($resultado_id){
		$dados_usuario = array();
		
		while ($linha = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
			$dados_usuario[] = $linha;
		}
		
		foreach ($dados_usuario as $usuario){
			echo ($usuario['email']);
			echo '<br /> <br />';
		}

	} else {
		echo 'Erro na execução da consulta, favor entrar em contato com o admin.';
	}
	
?>
