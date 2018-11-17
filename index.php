<!Doctype html>
<html>
<head>
    <title> Crespo Incorporadora </title>
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
                <a class="nav-link" href="index.html">HOME</a>
                <a class="nav-link" href="#">IMÓVEIS</a>
                <a class="nav-link" href="#">QUEM SOMOS</a>
                <a class="nav-link" href="#contato">CONTATO</a>
            </div>
        </div>

        <!--Carousel-->
        <div class="carousel">
            <img src="img/cristo1.jpg" class="cristo">
            <h1> O SEU SONHO COMEÇA AQUI! </h1>
            <img src="img/faixa.png" class="faixa">
        </div>
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
                    <input class="barra-busca form-control" type="text" placeholder="Digite condomínio, região ou bairro." name="#"></input>
                </div>
            </div>
        </div>

        <div class="imoveis-destaque">
            <div class="imoveis-row">
                <?php
                session_start();
                include "Conexao.php";
                $sql = $conexao->prepare("SELECT * FROM imoveis WHERE home='1' LIMIT 6");
                var_dump($sql);
                $sql->execute();
                $resultado = $sql->get_result();

                while($linha = $resultado->fetch_assoc()){

                    if(empty($linha['PrecoDeVenda'])) {
                        echo "
                        <div class='imovel'>
                            <h1>".$linha['bairro']."</h1>
                            <img src='img/thumb.php?src=casateste.jpg&size=300x200'>
                            <span class='valor'>
                                ALUGUEL ". $linha['PrecoDeAluguel']."
                            </span>
                            <div class='detalhes'>
                                <span>Dormitorios <br>".$linha['qquarto']."</span>
                                <span>Banheiros <br>".$linha['qbanheiro']."</span>
                                <span>Área <br>".$linha['areatotal']."m<sup>2</sup></span>
                            </div>
                        </div>";
                    } else {
                        echo "
                        <div class='imovel'>
                            <h1>".$linha['bairro']."</h1>
                            <img src='img/thumb.php?src=casateste.jpg&size=300x200'>
                            <span class='valor'>
                                VENDA ". $linha['PrecoDeVenda']."
                            </span>
                            <div class='detalhes'>
                                <span>Dormitorios <br>".$linha['qquarto']."</span>
                                <span>Banheiros <br>".$linha['qbanheiro']."</span>
                                <span>Área <br>".$linha['areatotal']."m<sup>2</sup></span>
                            </div>
                        </div>";
                    } 
                }
                ?>
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
</body>
</html>
