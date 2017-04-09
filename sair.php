<?php

	session_start();

	// a função unset elimina indices da super global SESSION
	unset($_SESSION['usuario']);
	unset($_SESSION['email']);

	echo 'Esperamos você de volta em breve!';

?>