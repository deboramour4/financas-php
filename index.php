<html>
	<head>
		<meta charset="utf-8">
		<title >Controle de Finanças </title >
		<link rel="stylesheet" type="text/css" href="css/main.css">
		
	</head>
	<body>
		<form method="POST" action="login.php">
			<center>
				<img src ="img/logo.png" width="20%" />
				<h1>$$$ Sistema de Controle de Financas $$$ </h1>
				<hr width="700px" /><br / >
				Favor entre com os dados de identificacao para acessar o sistema :
				<br /><br / >
				<table>
					<tr>
						<td width="150px">Usuario : </td>
						<td width="200px"><input type="text" name="username" size ="20">
						</td>
					</tr >
					<tr >
						<td width="150px">Senha : </td>
						<td width="200px"><input type="password" name="senha" size ="20">
						</td>
					</tr >
					<tr >
						<td width="150px"><img src="http://localhost/financas-PHP/captcha.php?l=150&a=50&tf=20&ql=5"></td>
						<td width="200px"><input type="text" name="captcha" size ="15">
						</td>
					</tr >
					<tr >
						<td><br /><input type="submit" value ="Enviar" name="enviar">
						</td>
					</tr >
				</table >
				<br /> <hr width="700px" /><br / >
				<p>Caso tenha problemas para acessar o sistema , favor enviar
					email para administrador@minhaempresa .com.br </p>
			</center>
		</form>
	</body>
</html>