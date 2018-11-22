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
            <h3><?= $resultado['IMO_NOME'] ?></h3>
            <h3><?= $resultado['IMO_PRECO_VENDA'] ?></h3>
            <h3><?= $resultado['IMO_BAIRRO'] ?></h3>
            <div class='atributos'>
                <div class='atributo'>
                    <!-- icone banheiro -->
                    <h3><?= $resultado['IMO_BANHEIROS'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone quartos -->
                    <h3><?= $resultado['IMO_QUARTOS'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone vagas -->
                    <h3><?= $resultado['IMO_VAGAS'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone reformas -->
                    <h3><?= $resultado['IMO_REFORMAS'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone suítes -->
                    <h3><?= $resultado['IMO_SUITES'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone Area Total -->
                    <h3><?= $resultado['IMO_AREA_TOTAL'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone Area Construida -->
                    <h3><?= $resultado['IMO_AREA_CONSTRUIDA'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone Condominio -->
                    <h3><?= $resultado['IMO_CONDOMINIO'] ?></h3>
                </div>
                <?php foreach (unserialize($resultado['IMO_CARACTERISTICAS']) as $value): ?>
                <div class='atributo'>
                    <!-- icone cad1 -->
                    <h3><?= utf8_decode($value) ?></h3>
                </div>
                <?php endforeach ?>
                <div class='atributo'>
                    <!-- icone descricao -->
                    <h3><?= utf8_decode($resultado['IMO_DESCRICAO']) ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone destaque -->
                    <h3><?= $resultado['IMO_DESTAQUE'] ?></h3>
                </div>
                <div class='atributo'>
                    <!-- icone Preco de Aluguel -->
                    <h3><?= $resultado['IMO_PRECO_ALUGUEL'] ?></h3>
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
</html>
