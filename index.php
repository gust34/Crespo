<!Doctype html>
<html>
<head>
    <title>Crespo Incorporadora</title>
    <meta charset="utf-8">
    <!--CSS reset e Bootstrap-->
    <link rel="Stylesheet" href="css/reset.css">
    <link rel="Stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="Stylesheet" href="css/style.css">
</head>
<body>
    <div class="section">
        <div class="header">
            <img src="img/logo.png" class="logo">
            <i class="fas fa-bars fa-2x" id="open_menu_mobile" onclick="openMenuMobile()"></i>
            <div class="menu row" id="menu_mobile">
                <a class="nav-link" href="index.php">HOME</a>
                <a class="nav-link" href="#">IMÓVEIS</a>
                <a class="nav-link" href="#">QUEM SOMOS</a>
                <a class="nav-link" href="#contato">CONTATO</a>
            </div>
        </div>

        <!--Carousel-->
        <div class="carousel" style="margin-top: 65px;">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="img/cristo1.jpg">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/img1.jpeg">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/img2.jpeg">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!-- <img src="img/faixa.png" class="faixa"> -->
    </div>

    <div class="section imoveis">
        <div class="busca">
            <div class="categorias">
            </div>
            <div class="barra">
                <div>
                    <select class="tipo form-control">
                        <option value="" selected disabled> Tipo </option>
                        <option value="">Casa</option>
                        <option value="">Apartamento</option>
                        <option value="">Barracão</option>
                        <option value="">Comercial</option>
                        <option value="">Kitnet</option>
                    </select>
                </div>
                <div>
                    <input class="barra-busca form-control" type="text" placeholder="Digite condomínio, região ou bairro." name="#">
                </div>
                <div>
                    <button type="button" class="btn btn-primary" style="background: yellow; color: black; border: none"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>

        <div class="imoveis-destaque">
            <div class="imoveis-row">
                <?php
                session_start();
                include "processos/conexao.php";
                $sql = $conexao->prepare("SELECT * FROM Imoveis WHERE IMO_DESTAQUE='1' AND IMO_ATIVO = '1' LIMIT 6");
                $sql->execute();
                $resultado = $sql->get_result();
                // Contador de itens em cada row
                $i = 0;
                ?>

                <?php while($linha = $resultado->fetch_assoc()): ?>
                    <?php if ($i % 3 == 0): ?>
                        </div>
                        <div class="imoveis-row">
                    <?php endif ?>
                    <?php $fotos = unserialize($linha['IMO_FOTOS']); ?>
                    <?php if(empty($linha['IMO_PRECO_VENDA'])): ?>
                        <div class='imovel'>
                            <h1><?=$linha['IMO_BAIRRO']?></h1>
                            
                            <img src='img/thumb.php?src=<?=__DIR__?>/processos/_uploads/<?=$fotos['foto0']?>&size=300x200'>
                            <span class='valor'>ALUGUEL <?=$linha['IMO_PRECO_ALUGUEL']?></span>
                            <div class='detalhes'>
                                <span>Dormitorios <br><?=$linha['IMO_QUARTOS']?></span>
                                <span>Banheiros <br><?=$linha['IMO_BANHEIROS']?></span>
                                <span>Área <br><?=$linha['IMO_AREA_TOTAL']?>m<sup>2</sup></span>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class='imovel'>
                            <h1><?=$linha['IMO_BAIRRO']?></h1>
                            <img src='img/thumb.php?src=<?=__DIR__?>/processos/_uploads/<?=$fotos['foto0']?>&size=300x200'>

                            <span class='valor'>VENDA <?=$linha['IMO_PRECO_VENDA']?></span>

                            <div class='detalhes'>
                                <span>Dormitorios <br><?=$linha['IMO_QUARTOS']?></span>
                                <span>Banheiros <br><?=$linha['IMO_BANHEIROS']?></span>
                                <span>Área <br><?=$linha['IMO_AREA_TOTAL']?>m<sup>2</sup></span>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php $i++; ?>
                <?php endwhile ?>
            </div>
            <div class="btn-row">
                <a type="button" href="lista_imoveis.php" id="verMais" class="btn btn-primary">Ver Mais</a>
            </div>
        </div>
    </div>

    <div class="section sobrenos" id="sobrenos">
        <div class="sobre">
            <h1> A PRIMEIRA INCORPORADORA DE TRÊS LAGOAS! </h1>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tempus et lacus at volutpat. Curabitur congue arcu orci, ac viverra tellus hendrerit in. Quisque vel arcu sit amet nisi porttitor semper et sit amet massa. Phasellus nec pulvinar ligula. Donec sit amet nisl nunc. </p>
        </div>
        <div class="sobre1">
            <div class="imagem">
            </div>
            <p> Cras malesuada sapien sit amet finibus dictum. Nam ultricies mollis diam, ullamcorper mollis felis aliquam eu. Nulla non purus eleifend, dapibus elit ac, sagittis mauris. Pellentesque tristique tellus mauris, ut semper tellus ultrices ac. Duis sollicitudin cursus pharetra. Nam maximus, ex ut volutpat posuere, nibh nulla luctus dolor, sed commodo enim augue scelerisque nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu nulla nec urna commodo accumsan eu in metus. Praesent sed malesuada diam. </p>
        </div>
        <div class="sobre2">
            <div class="imagem">
            </div>
            <p> Cras malesuada sapien sit amet finibus dictum. Nam ultricies mollis diam, ullamcorper mollis felis aliquam eu. Nulla non purus eleifend, dapibus elit ac, sagittis mauris. Pellentesque tristique tellus mauris, ut semper tellus ultrices ac. Duis sollicitudin cursus pharetra. Nam maximus, ex ut volutpat posuere, nibh nulla luctus dolor, sed commodo enim augue scelerisque nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu nulla nec urna commodo accumsan eu in metus. Praesent sed malesuada diam. </p>
        </div>
    </div>
    <div class="equipe">
        <div class="funcionario">
            <div class="foto-funcionario">
            </div>
            <div class="informacoes">
                <!--   <h1> nome </h1>
               <h1> creci </h1>
               <h1> cargo </h1> -->
           </div>
        </div>
    </div>

    <div class="section contato">
    </div>

    <div class="rodape-baixo" id="footer">
        <!-- <div class="row justify-content-center">
           <div class="col-sm-3 ml-5 pl-5 mt-4">
               <img src="img/logo.png" class="logo-rodape">
           </div>
        </div>
        <div class="row justify-content-center">
           <div class="col-sm-3 ml-5 pl-5 mt-5">
                  Funcionamento
               <span class="ml-4"> Horário de Funcionamento </span><br>
               <span class="text-center"> Segunda à sexta das 06:00 às 17:30 </span>
           </div>
        </div>
        <div class="row justify-content-center">
           <div class="col-sm-4 ml-5 pl-5 mt-4 mb-3">
               <span class="text-center ml-3"> DESENVOLVIDO POR I AM IAN WEB DESIGN </span>                                 
           </div>
        </div> -->
        <div class="row justify-content-center">
            <div>
                <img src="img/logo.png" class="logo-rodape">
            </div>
        </div>
        <div class="row justify-content-center">
            <div>
                <!-- Funcionamento -->
                <span class="ml-4"> Horário de Funcionamento </span><br>
                <span class="text-center"> Segunda à sexta das 06:00 às 17:30 </span>
            </div>
        </div>
        <div class="row justify-content-center">
            <div>
                <span class="text-center ml-3"> DESENVOLVIDO POR I AM IAN WEB DESIGN </span>                                 
            </div>
        </div>
        <!--Fim do Rodapé-->
    </div>
    <script type="text/javascript" src="js/actions.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
