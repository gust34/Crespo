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
    <link rel="Stylesheet" href="css/included_styles.css">
</head>
<body>
    <div class="section">
        <?php include '_includes/menu.php'; ?>
    </div>
    
    <hr style="margin-bottom: 1em; margin-top: 0" class="col-12">
    
    <main class="container" style="margin-top: 70px;">
        <hr style="margin-bottom: 1em;">

        <div class="busca">
            <ul class="nav nav-pills justify-content-center" id="categorias" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" onclick="selectCategoria('Geral', 'lista')" data-toggle="pill" href="#!" role="tab" aria-controls="pills-home" aria-selected="true">Geral</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="selectCategoria('Comprar', 'lista')" data-toggle="pill" href="#!" role="tab" aria-controls="pills-profile" aria-selected="false">Comprar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="selectCategoria('Alugar', 'lista')" data-toggle="pill" href="#!" role="tab" aria-controls="pills-contact" aria-selected="false">Alugar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="selectCategoria('Rural', 'lista')" data-toggle="pill" href="#!" role="tab" aria-controls="pills-contact" aria-selected="false">Rural</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" onclick="selectCategoria('Lancamentos', 'lista')" data-toggle="pill" href="#!" role="tab" aria-controls="pills-contact" aria-selected="false">Lançamentos</a>
                </li>
            </ul>
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
                    <input type="hidden" name="categoria" id="txtCategoria" value="Geral">
                    <input class="barra-busca form-control" type="text" placeholder="Digite condomínio, região ou bairro." name="nome" style="margin-bottom: 1em;">
                </div>
                <button type="submit" class="btn btn-primary col-4 col-lg-1" style="background: yellow; color: black; border: none"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <hr style="margin-bottom: 1em;" class="col-12">

        <div class="row" id="imoveisSelecionados">
            <?php $i = 0 ?>
            <?php if (!empty($imoveis)): ?>
                <?php foreach ($imoveis as $key => $imovel): ?>
                <?php $i++; ?>
                <a href="imovel.php?cod=<?=$imovel['IMO_COD']?>" class="item col-12 col-lg-4">
                    <div class="row align-items-center">
                        <?php $imovel['IMO_FOTOS'] = unserialize($imovel['IMO_FOTOS']) ?>
                        <img src="img/thumb.php?src=<?=__DIR__?>/processos/_uploads/<?=$imovel['IMO_FOTOS']['foto0']?>&size=300x200" class="col-6">
                        <div class="col-6 truncate">
                            <strong title="Nome"><?=$imovel['IMO_NOME']?></strong>
                            <p><?= $imovel['IMO_BAIRRO'] ?></p>
                            <?php if($imovel['IMO_A_VENDA']): ?>
                            <div class="row justify-content-center">
                                <p class="col-12 price">Venda R$<?=$imovel['IMO_PRECO']?></p>
                            </div>
                            <?php else: ?>
                            <div class="row justify-content-center">
                                <p class="col-12 price">Aluguel R$<?=$imovel['IMO_PRECO']?></p>
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
                <h4>Nenhum imóvel foi encontrado</h4>
            <?php endif ?>
        </div>
    </main>

    <hr style="margin-bottom: 1em;" class="col-12">

    <?php include '_includes/footer.php'; ?>
    <script type="text/javascript" src="js/ajax.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
