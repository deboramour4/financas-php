<?php
	include "valida_sessao.php";
	include "conecta_mysql.php";
	//Verifica se é administrador
	$perfil_usuario = $_SESSION["perfil_usuario"];
	if ($perfil_usuario!=2)
		header('Location: principal.php');
?>
<html>
<head>
	<title>Excluir Usuarios</title>
	<link rel="stylesheet" type="text/css" href="css/skeleton.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<h1 align="center">Excluir Usuários</h1>
	<div align="center">
		<table width ="1000px" border="0px" >
		 <th> Nome </th><th> CPF </th><th> Função </th ><th> Login </th ><th> Perfil </th > <th></th>
		 <?php
		 $resultado = mysql_query("SELECT * FROM usuarios") or die(mysql_error());
		 while($linha = mysql_fetch_array($resultado))
		 {
		 echo "<tr>";
		 echo "<td align='center' widtd='16%' >".$linha["nome"]." </td >";
		 echo "<td align='center ' widtd='16%' >".$linha["cpf"]." </td>";
		 echo "<td align='center' widtd='16%'>".$linha["funcao_empresa"]."</td >";
		 echo "<td align='center' widtd='16%'>".$linha["login"]."</td >";
		 echo "<td align='center' widtd='16%'>".$linha["perfil"]."</td >";
		 echo "<td align='center' widtd='16%'><a href='excluirUsuarios.php?id=".$linha["id"]."'>Excluir</td >";
		 echo " </tr>";
		 }
		 ?>
	 </table >		
		<br><br>
		<a href="/financas-PHP/principal.php">Voltar</a>
	</div>
</body>
</html>