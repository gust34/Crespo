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
</head>
<body>
    <div class="section">
        <?php include '_includes/menu.php'; ?>

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

    <?php include '_includes/footer.php'; ?>
</body>
</html>
