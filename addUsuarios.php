<?php
include "valida_sessao.php";

//verifica se eh administrador
$perfil_usuario = $_SESSION["perfil_usuario"];
if (!($perfil_usuario==2))
	header('Location: principal.php');

?>
<html >
	<head >
		<meta charset="utf-8">
		<title >Cadastro de usuários </title >
	</head >
	<body >
		<center >
		<img src="https://lh4.googleusercontent.com/rQ-f7UCQLwOqHcg8UtGhNnVeKt8vzPOs6fJ5eHKlJT5NvPHZjuxsWVCXRdJg2yyL1llsWCvoFah5OQTiyMB91ussvHZxjVNxMbwQaPr0PKmK3f6pxTpK67U7IV3nc3NONw" width="15%"/>
		<h1 >Cadastro de usuários </h1 >
			<hr width="700px" /><br />
			Formulário para cadastro de novos usuários (* Obrigatório)<br /><br />
			<form method="post" action="gravar_usuario.php" name='fCadUsuarios '>
				<table >
					<tr >
						<td width="130px">Nome *: </td >										
						<td width="200px"><input size="80" type="text" name="nome"></td >
					</tr >
					<tr >
						<td width="130px">Sexo *: </td >
						<td width="200px">
							<input type="radio" name="sexo" value="1" checked >Masculino
							<input type="radio" name="sexo" value="2" onclick="">Feminino
						</td >
					</tr >
					<tr >
						<td width="160px">Data de Nascimento *: </td >
						<td width="200px"><input type="date" name="nascimento"></td >
					</tr >
					<tr >
						<td width="130px">Estado Civil *: </td >
						<td width="200px">
							<select name="estado_civil">
								<option value="1">Solteiro </option >
								<option value="2">Casado </option >
								<option value="3">Separado </option >
								<option value="4">Divorciado </option >
								<option value="5">Viuvo </option >
								<option value="6">Uniao estável </option >
							</select >
						</td >
					</tr >
					<tr >
						<td width="130px">CPF*: </td >
						<td width="200px">
							<input type="text" name="cpf">
						</td >
					</tr >
					<tr >
						<td width="130px">Identidade: </td >
						<td width="200px">
							<input type="text" name="identidade">
						</td >
					</tr >
					<tr >
						<td width="130px">Email *: </td >										
						<td width="200px"><input size="30" type="email" name="email"></td >
					</tr >
					<tr >
						<td width="130px">Telefone*: </td >
						<td width="200px">
							<input size="9" type="text" name="telefone" maxlength="8">
						</td >
					</tr >
					<tr >
						<td width="130px">Login*: </td >
						<td width="200px">
							<input type="text" name="login">
						</td >
					</tr >
					<tr >
						<td width="130px">Senha*: </td >
						<td width="200px">
							<input type="password" name="senha">
						</td >
					</tr >
					<tr >
						<td width="130px">Função na empresa *: </td >
						<td width="200px"><input size="80" type="text" name="func"></td >
					</tr >
					<tr >
						<td width="130px">Perfil *: </td >
						<td width="200px">
							<input type="radio" name="perfil" value="1" checked >Padrão
							<input type="radio" name="perfil" value="2" onclick="">Administrador
						</td >
					</tr >
					<tr >
						<td width="130px">
							<input type="button" value="Voltar" name="voltar"
							onclick="javascript:history.back()">
						</td >
						<td width="200px">
							<input type="reset" value="Limpar">
							<input type="submit" value="Salvar">
						</td >
					</tr >
				</table >
			</form >
		</center >
	</body >
</html >