<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Imóveis</title>
</head>
<body>
    <form name="CadastrarImoveis" method="POST" action="Cadastrar.php">
        <center>
            <legend>Informações do Imóvel</legend>
            <br>
            Nome: 
            <input type="text" name="nome" required> <br><br>
            <!--Vírgula não passa para o banco os valores depois dela, tem que usar ponto, fazeer uma validação para isso-->
            Preço de Venda: 
            <input type="decimal"  name="precodevenda" required> <br><br>
            Preço de Aluguel: 
            <input type="decimal" name="precodealuguel" required> <br><br>
            Preço Unitário: 
            <input type="decimal" name="precounitario" required> <br><br>
            Tipo: 
            <select name="tipo" required>
                <option value=""></option>
                <option value="casa"> Casa </option>
                <option value="apartamento"> Apartamento </option>
                <option value="barracoes"> Barracões </option> 
                <option value="comercial"> Comercial </option> 
                <option value="terreno"> Terreno </option> 
            </select>

            <br><br>

            Rua: 
            <input type="text" name="rua" required> <br><br>
            Número: 
            <input type="number" name="numero" required> <br><br>
            Complemento: 
            <input type="text" name="complemento"> <br><br>
            Bairro: 
            <input type="text" name="bairro" required> <br><br>
            Cidade: 
            <input type="text" name="cidade" required> <br><br>
            Estado: 
            <select name="estado" required>
                <option value=""></option>
                <option value="AC">ACRE</option>
                <option value="AL">ALAGOAS</option>
                <option value="AP">AMAPÁ</option> 
                <option value="AM">AMAZONAS</option> 
                <option value="BA">BAHIA</option> 
                <option value="CE">CEARÁ</option>
                <option value="DF">DISTRITO FEDERAL</option>
                <option value="ES">ESPÍRITO SANTO</option>
                <option value="GO">GOIÁS</option> 
                <option value="MA">MARANHÃO</option> 
                <option value="MT">MATO GROSSO</option> 
                <option value="MS">MATO GROSSO DO SUL</option>
                <option value="MG">MINAS GERAIS</option>
                <option value="PA">PARÁ</option>
                <option value="PB">PARAÍBA</option> 
                <option value="PR">PARANÁ</option> 
                <option value="PE">PERNAMBUCO</option>
                <option value="PI">PIAUÍ</option>
                <option value="RJ">RIO DE JANEIRO</option>
                <option value="RN">RIO GRANDE DO NORTE</option>
                <option value="RS">RIO GRANDE DO SUL</option> 
                <option value="RO">RONDÔNIA</option> 
                <option value="RR">RORAIMA</option> 
                <option value="SC">SANTA CATARINA</option> 
                <option value="SP">SÃO PAULO</option> 
                <option value="SE">SERGIPE</option>
                <option value="TO">TOCANTINS</option>
            </select>

            <br><br>

            Quantidade de Vagas: 
            <input type="number" name="qvaga" required> <br><br>
            Quantidade de Dormitórios: 
            <input type="number" name="qdormitorio" required> <br><br>
            Quantidade de Suítes: 
            <input type="number" name="qsuite" required> <br><br>
            Quantidade de Banheiro: 
            <input type="number" name="qbanheiro" required> <br><br>
            Quantidade de Reformas: 
            <input type="number" name="qreformas" required> <br><br>
            Área Construída: 
            <input type="decimal" name="areaconstruida" required> <br><br>
            Área Reformada: 
            <input type="decimal" name="areareformada" required> <br><br>
            Área Útil: 
            <input type="decimal" name="areautil" required> <br><br>
            Características: 
            <input type="text" name="caracteristicas"> <br><br>
            Sobre: 
            <input type="textbox" name="sobre"> <br><br>
            Condomínio Fechado: 
            <input type="text" name="condfec"> <br><br>
            Foto: 
            <input type="file" name="foto"> <br><br>

            <input type="submit" value="Enviar">
            <input type="reset" value="Limpar Campos"><br><br><br>

            <?php
            if (!empty($_SESSION['Erro'])) {
                echo $_SESSION['Erro']
                unset ($_SESSION['Erro']);                          
            }
            ?> 
        </center>   
    </form>
</body>
</html>
