<?php require 'processos/get_imovel.php'; ?>
<!Doctype html>
<html>
<head>
    <title>Crespo Incorporadora</title>
    <meta charset="utf-8">
    <!--CSS reset e Bootstrap-->
    <link rel="Stylesheet" href="css/reset.css">
    <link rel="Stylesheet" href="css/style.css">
    <link rel="Stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="Stylesheet" href="css/included_styles.css">
    <link rel="Stylesheet" href="css/imovel.css">
</head>
<body>
    <style type="text/css">
    .header {
        position: relative;
    }
</style>
<?php include '_includes/menu.php'; ?>

<hr class="col-12">

<main>
    <div id="fotosImovel" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php foreach (unserialize($imovel['IMO_FOTOS']) as $value): ?>
            <li data-target="#fotosImovel" data-slide-to="0"></li>
            <?php endforeach ?>
        </ol>
        <div class="carousel-inner">
            <?php foreach (unserialize($imovel['IMO_FOTOS']) as $key => $value): ?>
            <div class="carousel-item <?=$key == 'foto0' ? 'active' : ''?>">
                <img class="d-block w-100" src="processos/_uploads/<?=$value?>">
            </div>
            <?php endforeach ?>
        </div>
        <a class="carousel-control-prev" href="#fotosImovel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#fotosImovel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container-fluid" style="margin-top: 1em;" id="dadosImovel">
        <div class="col-12 no-margin">
            <div class="row">
                <p class="dados row no-margin">
                    <strong class="col-8 truncate"><?=$imovel['IMO_NOME']?></strong> <br>
                    <span class="col-8 truncate"><?=$imovel['IMO_BAIRRO']?></span>
                    <?php if ($imovel['IMO_A_VENDA']): ?>
                    <span class="col-4 price">Aluguel R$<?=$imovel['IMO_PRECO']?></span>
                    <?php else: ?>
                    <span class="col-4 price">Venda R$<?=$imovel['IMO_PRECO']?></span>
                    <?php endif ?>
                </p>
                <p>
                    <div class="detalhes container-fluid">
                        <span>Dormitorios <br> <?=$imovel['IMO_QUARTOS']?></span>
                        <span>Banheiros <br> <?=$imovel['IMO_BANHEIROS']?></span>
                        <span>Área <br> <?=$imovel['IMO_AREA_TOTAL']?>m<sup>2</sup></span>
                    </div>
                </p>
                <p class="col-12 caracteristicas">
                    <strong>Detalhes</strong>
                    <ul class="row" style="margin: 0">
                        <?php foreach (unserialize($imovel['IMO_CARACTERISTICAS']) as $key => $value): ?>
                        <li class="col-6 truncate"><?=$value?></li>
                        <?php endforeach ?>
                    </ul>
                </p>
                <p class="col-12" style="text-align: justify; margin-top: 1em;">
                    <?=$imovel['IMO_DESCRICAO']?>
                </p>
            </div>
        </div>
        <hr>
        <div class="container-fluid" style="background: #f1ea22; padding: 1em;">
            <form class="col-12">
                <p><strong>Gostou desse imóvel? Deixe suas informações para entrarmos em contato.</strong></p>
                <div class="form-group">
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="duvida" name="duvida" rows="3" placeholder="Dúvida"></textarea>
                </div>
                <button type="submit" class="btn btn-primary col-8">Enviar</button>
            </form>
        </div>
    </div>
</main>

<hr class="col-12">


<?php include '_includes/footer.php'; ?>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.carousel').carousel()
    });
</script>
</body>
</html>
