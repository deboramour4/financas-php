<?php
	include "valida_sessao.php";
	include "conecta_mysql.php";
	$id = $_GET['id'];
	$sql = "DELETE from usuarios where id=".$id;
	echo $sql;
	mysql_query($sql);
	mysql_close($con);
	header('Location: /financas-PHP/delUsuarios.php');
?>