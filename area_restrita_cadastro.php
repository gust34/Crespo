<!Doctype html>
	<html>
		<head>
		<?php
            session_start();
        ?>
			<title> Área Restrita </title>
			<link rel="Stylesheet" href="css/bootstrap.min.css">
			<link rel="Stylesheet" href="css/style_restricted_area.css">
			<meta charset="utf-8">
		</head>
		<body>
        <!--Top bar-->
        <!--header
		<div class="section">
          <div class="header">
            <img src="img/logo.png" class="logo">
            <div class="menu">
            <a class="nav-link" href="index.html">HOME</a>
            <a class="nav-link" href="#">IMÓVEIS</a>
            <a class="nav-link" href="#">QUEM SOMOS</a>
            <a class="nav-link" href="#contato">CONTATO</a>
            </div>
          </div>
            Fim top bar-->
		 
		
		<!--Início da área da tabela-->


        <!--Fim da área da tabela-->


        <!--Início Modal-->

        <form name="cadastro_imovel" method="POST" action="Cadastrar.php">
		
		<!--Required é uma validação bostinha, mas funciona-->
            <input type="text" id="#" name="nome" placeholder="TÍTULO" size="50" required> <br><br>
			
            <select class="" name="tipo" id="#" required>
                <option value="" selected disabled> Tipo </option>
                <option value="casa">Casa</option>
                <option value="apartamento">Apartamento</option>
                <option value="barracão">Barracão</option>
                <option value="comercial">Comercial</option>
                <option value="kitnet">Kitnet</option>
             </select>

             <select class="" name="categoria" id="#" required>
                <option value="" selected disabled> Categoria </option>
                <option value="comprar">Comprar</option>
                <option value="alugar">Alugar</option>
                <option value="lançamento">Lançamentos</option>
                <option value="rural">Rural</option>
             </select>
            
             <h1> Bairro </h1>
             <input type="text" id="#" name="bairro" placeholder="BAIRRO" required> 

             <h1> Dormitórios </h1>
             <input type="text" id="#" name="qsuite" placeholder="SUÍTES">
             <input type="text" id="#" name="qquarto" placeholder="QUARTOS"> <br><br>

            <h1> Área </h1>
            <input type="text" id="#" name="areatotal" placeholder="TOTAL" required>
             <input type="text" id="#" name="areaconstruida" placeholder="CONSTRUÍDA" required><br><br>

             <h1> Outros </h1>

             <input type="text" id="#" name="qbanheiro" placeholder="BANHEIROS" required>
             <input type="text" id="#" name="qvaga" placeholder="VAGAS" required>

             <h1> Condomínio? </h1>

             <input type="radio" id="#" name="crad" value="sim"> Sim
             <input type="text" id="#" name="cond" placeholder= "Condomínio" > 
             <input type="radio" id="#" name="crad" value="não"> Não

             <h1> Características </h1>
             <input type="text" id="#" name="cad1" placeholder="Característica 1"> <input type="text" id="#" name="cad6" placeholder="Característica 6"><br> 
             <input type="text" id="#" name="cad2" placeholder="Característica 2"> <input type="text" id="#" name="cad7" placeholder="Característica 7"> <br>
             <input type="text" id="#" name="cad3" placeholder="Característica 3"> <input type="text" id="#" name="cad8" placeholder="Característica 8"> <br>
             <input type="text" id="#" name="cad4" placeholder="Característica 4"> <input type="text" id="#" name="cad9" placeholder="Característica 9"> <br>
             <input type="text" id="#" name="cad5" placeholder="Característica 5"> <input type="text" id="#" name="cad10" placeholder="Característica 10"> <br>
             
                                                    <br><br>


             <textarea name="descricao"  id=#> Descrição </textarea> <br><br>
             <input type="file" name="foto" id="#" class="#"  accept="image/png, image/jpeg"  multiple> <br><br> <!--Botão de upload de imagens-->

             <button type="submit" name="enviar"> Cadastrar Imóveis </button>
			 
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
        	


        </form>

        <!--Fim Modal-->
				
		</div>
		<!--Footer
	
          <div class="rodape-baixo">
         <div class="row justify-content-center">
             <div class="col-sm-3 ml-5 pl-5 mt-4">
                   <img src="img/logo.png" class="logo-rodape">
             </div>
         </div>
         <div class="row justify-content-center">
             <div class="col-sm-3 ml-5 pl-5 mt-5">
            
                  <span class="ml-4"> Horário de Funcionamento </span><br>
                  <span class="text-center"> Segunda à sexta das 06:00 às 17:30 </span>
             </div>
         </div>
         <div class="row justify-content-center">
                 <div class="col-sm-4 ml-5 pl-5 mt-4 mb-3">
                     <span class="text-center ml-3"> DESENVOLVIDO POR I AM IAN WEB DESIGN </span>                                  </div>
         </div>
 
		</div> -->
	
		
        </body>
      </head>
