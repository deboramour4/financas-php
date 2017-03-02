<?php
	include "valida_sessao.php";
	include "conecta_mysql.php";
	// Obtem o usuario que efetuou o login
	$nome_usuario = $_SESSION["nome_usuario"];
	$resultado = mysql_query("SELECT * FROM usuarios WHERE login='".$nome_usuario."'");
	$id_usuario = mysql_result($resultado,0,"id");
?>
<html>
<head>
	<title>Excluir</title>
	<link rel="stylesheet" type="text/css" href="css/skeleton.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<h1 align="center">Excluir</h1>
	<div align="center">
		<h5>Receitas</h5>
		<?php
			$resultado = mysql_query("SELECT * FROM receitas_despesas where tipo=1 AND usuario=".$id_usuario) or die(mysql_error());
			
			while($array = mysql_fetch_array($resultado)){
				echo $array['nome'].' - <a href="excluir.php?nome='.$array['nome'].'">Excluir</a>'.'<br>';	
			}
		?>
		<hr>
		<h5> Despesas </h5>
		<?php
			$resultado = mysql_query("SELECT * FROM receitas_despesas where tipo=2 AND usuario=".$id_usuario) or die(mysql_error());
			while($array = mysql_fetch_array($resultado)){
				echo $array['nome'].' - <a href="excluir.php?nome='.$array['nome'].'">Excluir</a>'.'<br>';
			}
			mysql_close($con);
		?>
					
		<br><br>
		<a href="/financas-PHP/principal.php">Voltar</a>
	</div>
</body>
</html>