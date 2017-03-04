  <?php
	include "valida_sessao.php";
	include "conecta_mysql.php";

	$nome_usuario = $_SESSION["nome_usuario"];
	$id_usuario = $_SESSION["id_usuario"];

	if(!isset($_GET['mes'])){
	  $mes = date('n');
	}else{
	  $mes = $_GET['mes'];
	}

	$meses = array ("Janeiro","Fevereiro","¸Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");
	$resRecVar = mysql_query("SELECT * FROM receitas_despesas WHERE classe=1 and mes=".$mes." and tipo=1 and usuario=".$id_usuario);
	$resDesVar = mysql_query("SELECT * FROM receitas_despesas WHERE classe=1 and mes=".$mes." and tipo=2 and usuario=".$id_usuario);
	$resRecFix = mysql_query("SELECT * FROM receitas_despesas WHERE classe=2 and tipo=1 and usuario=".$id_usuario);
	$resDesFix = mysql_query("SELECT * FROM receitas_despesas WHERE classe=2 and tipo=2 and usuario=".$id_usuario);
	 // Valores Totais Receitas e Despesas
	$recVarTotal = 0; 
	$recFixTotal = 0; 
	$desVarTotal = 0; 
	$desFixTotal = 0;

	//mysql_close($con);
?>


 <html>
 <head>
	 <meta charset="utf-8">
	 <title >Controle de Finanças </title >
	 <link rel="stylesheet" type="text/css" href="css/main.css">
 </head >
 <body>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <form method="GET" name="fmes" action="saldosMensaisPlan.php">
	 <center >
	 <img src="img/logo.png" width="20%"/>
	 <h1 >Sistema de Controle de Finanças Empresarial </h1 >
	 <hr width="700px" /><br />

	 <p>Favor , escolha o mes que deseja visualizar:
		 <select name="mes" onchange="javascript: document.fmes.submit();">
		 	 <option value="0" onclick="javascript:document.fmes.submit();">
			  </option >
			 <option value="1" onclick="javascript:document.fmes.submit();">
			 Janeiro </option >
			 <option value="2" onclick="javascript:document.fmes.submit();">
			 Fevereiro </option >
			 <option value="3" onclick="javascript:document.fmes.submit();">
			 Marco </option >
			 <option value="4" onclick="javascript:document.fmes.submit();">
			 Abril </option >
			 <option value="5" onclick="javascript:document.fmes.submit();">
			 Maio </option >
			 <option value="6" onclick="javascript:document.fmes.submit();">
			 Junho </option >
			 <option value="7" onclick="javascript:document.fmes.submit();">
			 Julho </option >
			<option value="8" onclick="javascript:document.fmes.submit();">
			 Agosto </option >
			 <option value="9" onclick="javascript:document.fmes.submit();">
			 Setembro </option >
			 <option value="10" onclick="javascript:document.fmes.submit();">
			 Outubro </option >
			 <option value="11" onclick="javascript:document.fmes.submit();">
			 Novembro </option >
			 <option value="12" onclick="javascript:document.fmes.submit();">
			 Dezembro </option >
		 </select >
	 </p>

	 <?php if (isset($mes)) { ?>
	 <b>Lista de RECEITAS - Mes de <?php echo $meses[$mes -1]?></b><br><br >
	 Fixas
	 <hr width="700px" />
	 <table width ="700px" border="0px" >
		 <th> Nome </th><th> Data e Hora de Cadastro </th><th> Valor (R$)</th >
		 <?php
		 while($linha = mysql_fetch_array($resRecFix , MYSQL_ASSOC ))
		 {
		 echo "<tr>";
		 echo "<td align='left' width='33%' >".$linha["nome"]." </td >";
		 echo "<td align='center ' width='33%' >".$linha["datahora"]." </td>";
		 echo "<td align='right' width='33%'>".$linha["valor"]."</td >";
		 echo " </tr>";
		 // Incrementar o valor total
		 $recFixTotal = $recFixTotal + $linha["valor"];
		 }
		 ?>

		 <tr >
			<th width =33%></th>
			<th width =33%></th>
			<th width='33%'><b>Total: </b></th>
		 </tr >
		 <tr>
		 	<th width =33%></th>
			<th width =33%></th>
		 	<th width =33% align="right"><b>$ <?php echo $recFixTotal; ?></b></th>
		 </tr>
	 </table ><br >

	 Variaveis
	 <hr width="700px" />
	 <table width="700px" border="0px" >
	 <?php
	 while($linha = mysql_fetch_array($resRecVar , MYSQL_ASSOC ))
	 {
		echo "<tr >";
		echo "<td align='left ' width='33%' >" . $linha["nome"] . " </td >";
		echo "<td align='center ' width='33%' >" . $linha["datahora"] . " </td>";
		echo "<td align='right' width='33%'>" . $linha["valor"] . " </td >";
		echo " </tr >";
	// Incrementar o valor total
	$recVarTotal = $recVarTotal + $linha["valor"];
	} ?>

	<tr >
		<th width =33%></th>
		<th width =33%></th>
		<th width='33%'><b>Total: </b></th>
	</tr >
	<tr>
	 	<th width =33%></th>
		<th width =33%></th>
	 	<th width =33% align="right"><b>$ <?php echo $recVarTotal; ?></b></th>
	</tr>
	 </table ><br />
	 <b>Lista de DESPESAS - Mes de <?php echo $meses[$mes -1]?></b><br /><br />
	 Fixas
	 <hr width="700px" />
	 <table width="700px" border="0px" >
	 <th> Nome </th><th> Data e Hora de Cadastro </th><th> Valor (R$)</th>
	 
	 <?php
	 while($linha = mysql_fetch_array($resDesFix , MYSQL_ASSOC ))
	 {
	 echo "<tr >";
	 echo "<td align='left' width='33%'>" . $linha["nome"] . " </td >";
	 echo "<td align='center' width='33%' >" . $linha["datahora"] . " </td>";

	 echo "<td align='right' width =33%>" . $linha["valor"] . " </td >";
	 echo " </tr >";
	 // Incrementar o valor total
	 $desFixTotal = $desFixTotal + $linha["valor"];
	 } ?>
	 <tr >
		<th width =33%></th>
		<th width =33%></th>
		<th width='33%'><b>Total: </b></th>
	 </tr >
	 <tr>
	 	<th width =33%></th>
		<th width =33%></th>
	 	<th width =33% align="right"><b>$ <?php echo $desFixTotal; ?></b></th>
	</tr>
	 </table >
	 <br />
	 Variaveis
	 <hr width="700px" />
	 <table width='700px' border='0px'>
	 <?php
	 while($linha = mysql_fetch_array($resDesVar , MYSQL_ASSOC ))
	 {
	echo "<tr >";
	echo "<td align='center' width='33%' >" . $linha["nome"] . " </td >";
	echo "<td align='center' width='33%' >" . $linha["datahora"] . " </td>";
	echo "<td align='center' width ='33%' >" . $linha["valor"] . "</td >";
	echo "</tr >";
	// Incrementar o valor total
	$desVarTotal = $desVarTotal + $linha["valor"];
	} ?>

	<tr >
		<th width =33%></th>
		<th width =33%></th>
		<th width='33%'><b>Total: </b></th>
	 </tr >
	 <tr>
	 	<th width =33%></th>
		<th width =33%></th>
	 	<th width =33% align="right"><b>$ <?php echo $desVarTotal; ?></b></th>
	 </tr>
	</table ><br />

	<b>GRÁFICOS</b>
	<hr width="700px" />
	 <div id="chart_div" style="width: 70%; height: 500px;"></div>
	 <p style="width: 700px;" >Nesse <b>gráfico</b> você observará os valores totais de receitas e despesas de cada mês. Lembrando que os <b>valores fixos</b> aparecem em todos os meses.</p>

	<b>SALDO </b>
	<hr width="700px" />
	<table width="700px" border="0px" >
	<tr>
	<td width="50%">Receitas: </td>
	<td align="right" width="50%"><?php echo($recFixTotal+$recVarTotal)?> </td> </tr>
	<tr>
	<td width="50%">Despesas: </td>
	<td align="right" width="50%"><?php echo($desFixTotal+$desVarTotal)?> </td> </tr>
	<tr>
	 <td width="50%">Saldo: </td>
	 <td align="right" width="50%">
	 	<b>$ <?php echo ($recFixTotal+$recVarTotal)-($desFixTotal+$desVarTotal) ?> </b>
	 </td>
	</tr>
	<tr >
	<td>
	<input type="button" onClick="location.href='principal.php'" value="Voltar"></td> 
	</td>
	</tr>
	 </table >

	 <?php
	 }
	 ?>
 </center >
 </form >

<?php
	$valores =[];
	$num = 0;

	for ($i=1; $i <=12; $i++) { 
		for ($j=1; $j <=2; $j++) { 
			$result = mysql_query("SELECT SUM(valor) AS result FROM receitas_despesas WHERE mes=".$i." AND classe=1 AND usuario=".$id_usuario." AND tipo=".$j);
			$row = mysql_fetch_assoc($result); 
			$valores[$num] = $row['result'];
			$num++;
		}
	}

	$despesas_fixo = mysql_query("SELECT SUM(valor) AS result FROM receitas_despesas WHERE tipo=2 AND classe=2 AND usuario=".$id_usuario);
	$rowDF = mysql_fetch_assoc($despesas_fixo); 
	$valorDF= $rowDF['result'];

	$receitas_fixo = mysql_query("SELECT SUM(valor) AS result FROM receitas_despesas WHERE tipo=1 AND classe=2 AND usuario=".$id_usuario);
	$rowRF = mysql_fetch_assoc($receitas_fixo); 
	$valorRF= $rowRF['result'];

	mysql_close($con);
?>


<script type="text/javascript">
	<?php echo $valores[10]; ?>
	google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Meses', 'Receitas', 'Despesas'],
          ['Janeiro', <?php echo $valores[0]+$valorRF; ?>, <?php echo $valores[1]+$valorDF; ?>],
          ['Fevereiro',  <?php echo $valores[2]+$valorRF; ?>,  <?php echo $valores[3]+$valorDF; ?>],
          ['Março',  <?php echo $valores[4]+$valorRF; ?>,  <?php echo $valores[5]+$valorDF; ?>],
          ['Abril',  <?php echo $valores[6]+$valorRF; ?>, <?php echo $valores[7]+$valorDF; ?>],
          ['Maio',  <?php echo $valores[8]+$valorRF; ?>,  <?php echo $valores[9]+$valorDF; ?>],
          ['Junho',  <?php echo $valores[10]+$valorRF; ?>,   <?php echo $valores[11]+$valorDF; ?>],
          ['Julho',  <?php echo $valores[12]+$valorRF; ?>,   <?php echo $valores[13]+$valorDF; ?>],
          ['Agosto', <?php echo $valores[14]+$valorRF; ?>,   <?php echo $valores[15]+$valorDF; ?>],
          ['Setembro',  <?php echo $valores[16]+$valorRF; ?>,   <?php echo $valores[17]+$valorDF; ?>],
          ['Outubro',  <?php echo $valores[18]+$valorRF; ?>,   <?php echo $valores[19]+$valorDF; ?>],
          ['Novembro', <?php echo $valores[20]+$valorRF; ?>,   <?php echo $valores[21]+$valorDF; ?>],
          ['Dezembro', <?php echo $valores[22]+$valorRF; ?>,   <?php echo $valores[23]+$valorDF; ?>]
        ]);

        var options = {
          title: 'Balanço geral de Receitas e Despesas (anual)',
          hAxis: {title: 'Meses',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }

 </script>


 </body >
 </html >


