<?php require 'processos/load_imoveis.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Imóveis | Crespo</title>

    <!--CSS reset e Bootstrap-->
    <link rel="Stylesheet" href="css/reset.css">
    <link rel="Stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="Stylesheet" href="css/lista.css">
</head>
<body>
    <header class="fluid-container" style="text-align: center; line-height: 100px;">
        HEADER
    </header>

    <div class="container">
        <form class="barra row" method="post">
            <div class="col-12 col-lg-3" style="margin-bottom: 1em;">
                <select name="tipo" class="tipo form-control">
                    <option value="" selected disabled> Tipo </option>
                    <option value="Casa">Casa</option>
                    <option value="Apartamento">Apartamento</option>
                    <option value="Barracao">Barracão</option>
                    <option value="Comercial">Comercial</option>
                    <option value="KitNet">Kitnet</option>
                </select>
            </div>
            <div class="col-12 col-lg-6">
                <input class="barra-busca form-control" type="text" placeholder="Digite condomínio, região ou bairro." name="nome" style="margin-bottom: 1em;">
            </div>
            <button type="submit" class="btn btn-primary col-4 col-lg-1" style="background: yellow; color: black; border: none"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <hr style="margin-bottom: 1em;">

    <main class="container">
        <div class="row">
            <?php $i = 0 ?>
            <?php if (!empty($imoveis)): ?>
                <?php foreach ($imoveis as $key => $imovel): ?>
                <?php $i++; ?>
                <a href="imovel.php?cod=<?=$imovel['IMO_COD']?>" class="item col-12 col-lg-4">
                    <div class="row align-items-center">
                        <img src="img/casateste.jpg" class="col-6">
                        <div class="col-6 truncate">
                            <strong title="Nome"><?=$imovel['IMO_NOME']?></strong>
                            <p><?= $imovel['IMO_BAIRRO'] ?></p>
                            <?php if(empty($imovel['IMO_PRECO_VENDA'])): ?>
                            <div class="row justify-content-center">
                                <p class="col-12 price">Aluguel R$<?=$imovel['IMO_PRECO_ALUGUEL']?></p>
                            </div>
                            <?php else: ?>
                            <div class="row justify-content-center">
                                <p class="col-12 price">Venda R$<?=$imovel['IMO_PRECO_VENDA']?></p>
                            </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <hr class="no-margin">
                    <div class="row">
                        <div class="detalhes container-fluid">
                            <span>Dormitorios <br> <?= $imovel['IMO_QUARTOS'] ?></span>
                            <span>Banheiros <br> <?= $imovel['IMO_BANHEIROS'] ?></span>
                            <span>Área <br> <?= $imovel['IMO_AREA_TOTAL'] ?>m<sup>2</sup></span>
                        </div>
                    </div>
                </a>
                <hr style="margin-bottom: 1em;" <?= $i % 3 == 0 ? 'class=col-12' : ''?>>
                <?php endforeach ?>
            <?php else: ?>
                <h3>Nada encontrado</h3>
            <?php endif ?>
        </div>
    </main>

    <hr style="margin-bottom: 1em;">

    <div class="rodape-baixo" id="footer">
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
</body>
</html>
