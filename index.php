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
    <link rel="Stylesheet" href="css/included_styles.css">
</head>
<body>
    <div class="section">
        <?php include '_includes/menu.php' ?>

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
            <ul class="nav nav-pills justify-content-center" id="categorias" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" onclick="selectCategoria('Geral', 'index')" data-toggle="pill" href="#!" role="tab" aria-controls="pills-home" aria-selected="true">Geral</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="selectCategoria('Comprar', 'index')" data-toggle="pill" href="#!" role="tab" aria-controls="pills-profile" aria-selected="false">Comprar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="selectCategoria('Alugar', 'index')" data-toggle="pill" href="#!" role="tab" aria-controls="pills-contact" aria-selected="false">Alugar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="selectCategoria('Rural', 'index')" data-toggle="pill" href="#!" role="tab" aria-controls="pills-contact" aria-selected="false">Rural</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" onclick="selectCategoria('Lancamentos', 'index')" data-toggle="pill" href="#!" role="tab" aria-controls="pills-contact" aria-selected="false">Lançamentos</a>
                </li>
            </ul>
            <form class="barra" method="post" action="lista_imoveis.php">
                <div>
                    <select name="tipo" class="tipo form-control">
                        <option value="" selected disabled> Tipo </option>
                        <option value="Casa">Casa</option>
                        <option value="Apartamento">Apartamento</option>
                        <option value="Barracao">Barracão</option>
                        <option value="Comercial">Comercial</option>
                        <option value="KitNet">Kitnet</option>
                    </select>
                </div>
                <div>
                    <input type="hidden" name="categoria" id="txtCategoria" value="Geral">
                    <input class="barra-busca form-control" type="text" placeholder="Digite condomínio, região ou bairro." name="nome">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" style="background: yellow; color: black; border: none"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>

        <div class="imoveis-destaque">
            <div id="imoveisSelecionados">
                <div class="imoveis-row">
                    <?php
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
                        <a class='imovel' href="imovel.php?cod=<?=$linha['IMO_COD']?>">
                            <h1><?=$linha['IMO_BAIRRO']?></h1>
                            
                            <img src='img/thumb.php?src=<?=__DIR__?>/processos/_uploads/<?=$fotos['foto0']?>&size=300x200'>
                            <?php if($linha['IMO_A_VENDA']): ?>
                            <span class='valor'>VENDA R$<?=str_replace('.', ',', $linha['IMO_PRECO'])?></span>
                            <?php else: ?>
                            <span class='valor'>ALUGUEL R$<?=str_replace('.', ',', $linha['IMO_PRECO'])?></span>
                            <?php endif ?>
                            <div class='detalhes'>
                                <span>Dormitorios <br><?=$linha['IMO_QUARTOS']?></span>
                                <span>Banheiros <br><?=$linha['IMO_BANHEIROS']?></span>
                                <span>Área <br><?=$linha['IMO_AREA_TOTAL']?>m<sup>2</sup></span>
                            </div>
                        </a>
                        <?php $i++; ?>
                    <?php endwhile ?>
                </div>
            </div>
            <div class="col-12">
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

    <div class="section contato" id="contato" style="height:auto;">
        <div class="parallax" style="height:auto; width:auto;">
            <div class="row text-center">
                <div class="col-sm-12">
                    <iframe style="" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d466.2717282532684!2d-51.705369636270966!3d-20.784254438440612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9490985e2c5c7ff3%3A0x42684e852be0d414!2sAv.+Ant%C3%B4nio+Trajano%2C+825+-+Centro%2C+Tr%C3%AAs+Lagoas+-+MS%2C+79640-310!5e0!3m2!1spt-BR!2sbr!4v1542982046192" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    
                    <div class="row text-center mt-3">
                        <div class="col-sm-12">   
                            <span style="font-size:15pt;">
                                 Av. Antônio Trajano, 825 <br>
                                Centro - Três Lagoas
                            </span>
                        </div>
                    </div>

                    <div class="row text-center mt-3">
                        <div class="col-sm-4">
                        <span style="font-size:20pt; color: green;">
                            <i class="fab fa-whatsapp"></i> <br> <span>                                                            
                        <span style="font-size:15pt; color: black;"> (XX) XXXXX-XXXX </span>
                        </div>

                         <div class="col-sm-4">
                        <span style="font-size:20pt; color: green;">
                            <i class="fab fa-whatsapp"></i> <br> <span>                                                            
                        <span style="font-size:15pt; color: black;"> (XX) XXXXX-XXXX </span>
                        </div>

                         <div class="col-sm-4">
                        <span style="font-size:20pt; color: black;">
                            <i class="far fa-envelope"></i> <Br>                                                        
                        <span style="font-size:15pt;"> xxxxxxxx@xxxxx.com </span>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '_includes/footer.php'; ?>
    <script type="text/javascript" src="js/ajax.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
