<?php
include "valida_sessao.php";
include "conecta_mysql.php";
// Obtem o usuario que efetuou o login
$nome_usuario = $_SESSION["nome_usuario"];
 // Obtem informacoes digitadas
$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$data_nasc = $_POST['nascimento'];
$estado_civil = $_POST['estado_civil'];
$cpf = $_POST['cpf'];
$identidade = $_POST['identidade'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$func = $_POST['func'];
$perfil = $_POST['perfil'];

 // Validacao dos campos nome e valor.
if(empty($nome) or empty($sexo) or empty($data_nasc) or empty($estado_civil) or empty($cpf) or empty($identidade) or empty($email) or empty($telefone) or empty($login) or empty($senha) or empty($func) or empty($perfil)) {
	$erro =1;
	$msg ="Por favor , preencha todos os campos obrigatorios.";
}else{
 // Id do usuario que efetuou o login
	$resultado = mysql_query("SELECT * FROM usuarios WHERE login='".$nome_usuario."'");
	$cad_usuario = mysql_result($resultado , 0, "id"); 
	$cad_datahora = date("Y-m-d H:i:s");

	$comandoSQL = "INSERT INTO `usuarios`(`login`, `senha`, `nome`, `sexo`, `identidade`, `cpf`, `nascimento`, `estado_civil`, `funcao_empresa`, `email`, `telefone`, `perfil`, `cad_usuario`, `cad_datahora`) VALUES ('".$login."','".$senha."','".$nome."',".$sexo.",'".$identidade."','".$cpf."','".$data_nasc."',".$estado_civil.",'".$func."','".$email."','".$telefone."',".$perfil.",".$cad_usuario.",'".$cad_datahora."')";

	$resultado = mysql_query($comandoSQL) or die('Erro fatal durante operacao com base de dados ');

	$msg ="Cadastro realizado com sucesso.";
}
mysql_close($con);
?>



<html >
<head >
<meta charset="utf-8">
<title >Controle de Finanças </title >
<link rel="stylesheet" type="text/css" href="css/main.css">
</head >
	<body >
	<center >
		<img src="img/logo.png" height="20%"/>
		<h1 >$$$ Cadastro realizado com sucesso $$$ </h1 >
			<hr width="700px"/><br />
			<?php
			echo "<p>".$msg." </p>";
			?>
			<p><a href='principal.php'>Voltar</a></p>
		</center >
	</body >
	</html >