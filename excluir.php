<?php
	include "valida_sessao.php";
	include "conecta_mysql.php";
	// Obtem o usuario que efetuou o login
	$nome_usuario = $_SESSION["nome_usuario"];
	$nome = $_GET['nome'];
	$sql = "DELETE from receitas_despesas where nome='".$nome."'";
	echo $sql;
	mysql_query($sql);
	mysql_close($con);
	header('Location: /financas-PHP/excluirReceitasDespesas.php');
?>