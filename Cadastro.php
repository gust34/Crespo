<!DOCTYPE html>
<html>
	<head>
	<?php
        session_start();
    ?>
		<meta charset="UTF-8">
    	<title> Cadastrar Imóveis </title>
	</head>
	<body>
		<form name="CadastrarImoveis" method="POST" action="Cadastrar.php">
		<center>
			<legend>Informações do Imóvel</legend>
			<br>
		Nome: <input type="text" name="nome" required><br><br>
		<!--Vírgula não passa para o banco os valores depois dela, tem que usar ponto, fazeer uma validação para isso-->
		Preço de Venda: <input type="decimal"  name="precodevenda" required><br><br>
		Preço de Aluguel: <input type="decimal" name="precodealuguel" required><br><br>
		Preço Unitário: <input type="decimal" name="precounitario" required><br><br>
		Tipo: <select name="tipo" required><br><br>
		    <OPTION VALUE="">  </OPTION>
		    <OPTION VALUE="casa"> Casa </OPTION>
            <OPTION VALUE="apartamento"> Apartamento </OPTION>
			<OPTION VALUE="barracoes"> Barracões </OPTION> 
            <OPTION VALUE="comercial"> Comercial </OPTION> 
			<OPTION VALUE="terreno"> Terreno </OPTION> 
			</select><br><br>
		Rua: <input type="text" name="rua" required><br><br>
		Número: <input type="number" name="numero" required><br><br>
		Complemento: <input type="text" name="complemento"><br><br>
		Bairro: <input type="text" name="bairro" required><br><br>
		Cidade: <input type="text" name="cidade" required><br><br>
		Estado: <select name="estado" required><br><br>
		    <OPTION VALUE="">  </OPTION>
		    <OPTION VALUE="AC"> ACRE </OPTION>
            <OPTION VALUE="AL"> ALAGOAS </OPTION>
			<OPTION VALUE="AP"> AMAPÁ </OPTION> 
            <OPTION VALUE="AM"> AMAZONAS </OPTION> 
			<OPTION VALUE="BA"> BAHIA</OPTION> 
			<OPTION VALUE="CE"> CEARÁ </OPTION>
		    <OPTION VALUE="DF"> DISTRITO FEDERAL </OPTION>
            <OPTION VALUE="ES"> ESPÍRITO SANTO </OPTION>
			<OPTION VALUE="GO"> GOIÁS </OPTION> 
            <OPTION VALUE="MA"> MARANHÃO </OPTION> 
			<OPTION VALUE="MT"> MATO GROSSO </OPTION> 
			<OPTION VALUE="MS"> MATO GROSSO DO SUL </OPTION>
		    <OPTION VALUE="MG"> MINAS GERAIS </OPTION>
            <OPTION VALUE="PA"> PARÁ </OPTION>
			<OPTION VALUE="PB"> PARAÍBA </OPTION> 
            <OPTION VALUE="PR"> PARANÁ </OPTION> 
			<OPTION VALUE="PE"> PERNAMBUCO </OPTION> 
			<OPTION VALUE="PI">  PIAUÍ</OPTION>
		    <OPTION VALUE="RJ"> RIO DE JANEIRO </OPTION>
            <OPTION VALUE="RN"> RIO GRANDE DO NORTE </OPTION>
			<OPTION VALUE="RS"> RIO GRANDE DO SUL </OPTION> 
            <OPTION VALUE="RO"> RONDÔNIA </OPTION> 
			<OPTION VALUE="RR"> RORAIMA </OPTION> 
            <OPTION VALUE="SC"> SANTA CATARINA </OPTION> 
			<OPTION VALUE="SP"> SÃO PAULO </OPTION> 
			<OPTION VALUE="SE"> SERGIPE </OPTION>
		    <OPTION VALUE="TO"> TOCANTINS </OPTION>
                </select><br><br>
		Quantidade de Vagas: <input type="number" name="qvaga" required><br><br>
		Quantidade de Dormitórios: <input type="number" name="qdormitorio" required><br><br>
		Quantidade de Suítes: <input type="number" name="qsuite" required><br><br>
		Quantidade de Banheiro: <input type="number" name="qbanheiro" required><br><br>
		Quantidade de Reformas: <input type="number" name="qreformas" required><br><br>
		Área Construída: <input type="decimal" name="areaconstruida" required><br><br>
		Área Reformada: <input type="decimal" name="areareformada" required><br><br>
		Área Útil: <input type="decimal" name="areautil" required><br><br>
		Características: <input type="text" name="caracteristicas"><br><br>
		Sobre: <input type="textbox" name="sobre"><br><br>
		Condomínio Fechado: <input type="text" name="condfec"><br><br>
		Foto: <input type="file" name="foto"><br><br>
	
		<input type="submit" value="Enviar">
		<input type="reset" value="Limpar Campos"><br><br><br>

    		    <?php
            	if (isset($_SESSION['Erro']))
            	{
					if($_SESSION['Erro'])
					{
						
						echo $_SESSION['Erro'];
					}
					else
					{
					echo $_SESSION['Erro'];
					}
                	unset ($_SESSION['Erro']);							
            	}
        		?>
        	
		</center>	
			</form>
		
		</body>
</html>