<?php require 'processos/get_imovel.php'; ?>
<!Doctype html>
<html>
<head>
    <title> Crespo Incorporadora </title>
    <meta charset="utf-8">
    <!--CSS reset e Bootstrap-->
    <link rel="Stylesheet" href="css/reset.css">
    <link rel="Stylesheet" href="css/style.css">
    <link rel="Stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
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
        <div class="imovel">
            <div class="fotos">
                <div class="carousel">
                    <!-- aqui ficará o carousel com as fotos do imóvel-->
                </div>
            </div>
        </div>

        <div class='detalhes'>
            <h3><?= $resultado['nome'] ?></h3>
            <h3><?= $resultado['PrecoDeVenda'] ?></h3>
            <h3><?= $resultado['bairro'] ?></h3>
            <div class='atributos'>
                <div class='atributo'>
                    <!-- icone banheiro -->
                    <h3><?= $resultado['qbanheiro'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone quartos -->
                    <h3><?= $resultado['qquarto'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone vagas -->
                    <h3><?= $resultado['qvaga'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone reformas -->
                    <h3><?= $resultado['qreformas'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone suítes -->
                    <h3><?= $resultado['qsuite'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone Area Total -->
                    <h3><?= $resultado['areatotal'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone Area Construida -->
                    <h3><?= $resultado['areaconstruida'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone Condominio -->
                    <h3><?= $resultado['crad'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone cad1 -->
                    <h3><?= $resultado['cad1'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone cad2 -->
                    <h3><?= $resultado['cad2'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone cad3 -->
                    <h3><?= $resultado['cad3'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone cad4 -->
                    <h3><?= $resultado['cad4'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone cad5 -->
                    <h3><?= $resultado['cad5'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone cad6 -->
                    <h3><?= $resultado['cad6'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone cad7 -->
                    <h3><?= $resultado['cad7'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone cad8 -->
                    <h3><?= $resultado['cad8'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone cad9 -->
                    <h3><?= $resultado['cad9'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone cad10 -->
                    <h3><?= $resultado['cad10'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone descricao -->
                    <h3><?= $resultado['descricao'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone tipo -->
                    <h3><?= $resultado['tipo'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone destaque -->
                    <h3><?= $resultado['home'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone Preco de Aluguel -->
                    <h3><?= $resultado['PrecoDeAluguel'] ?></h3>
                </div>
            </div>
            <!-- e assim vai... todos os atributos listados -->
            <!-- form com os campos nome, telefone e-mail para o interessado no imóvel-->
        </div>
    </div>

    <div class="rodape-baixo">
        <div class="row justify-content-center">
            <div class="col-sm-3 ml-5 pl-5 mt-4">
                <img src="img/logo.png" class="logo-rodape">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-3 ml-5 pl-5 mt-5">
                <!--Funcionamento-->
                <span class="ml-4"> Horário de Funcionamento </span><br>
                <span class="text-center"> Segunda à sexta das 06:00 às 17:30 </span>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-4 ml-5 pl-5 mt-4 mb-3">
                <span class="text-center ml-3"> DESENVOLVIDO POR I AM IAN WEB DESIGN </span>
            </div>
        </div>
        <!--Fim do Rodapé-->
    </div>
</body>
</head>
