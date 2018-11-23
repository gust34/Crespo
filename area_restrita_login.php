<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title> Área Restrita </title>
    <link rel="Stylesheet" href="css/bootstrap.min.css">
    <link rel="Stylesheet" href="css/style_restricted_area_1.css">
    <link rel="Stylesheet" href="css/included_styles.css">
    <meta charset="utf-8">
</head>
<body>
    <!--Top bar-->
    <div class="section">
        <?php include '_includes/menu.php'; ?>

        <!--Fim top bar-->


        <!--Início da área Formulário-->
        <div class="container-fluid area-form">
            <div class="formulario">
                <div class="container-fluid h-100 w-50  mt-5">
                    <div class="row justify-content-center quadrado">
                        <div class="col-md-10 text-center Container-1">
                            <h3 style= "margin-top: 4%;"> Área Restrita </h3>
                            <div class="row justify-content-center Container-1">
                                <div class="col-md-9 Form-1" style="margin:4px; padding: 40px 30px; width: 700px;">
                                    <form action="processos/logar.php" method="POST">
                                        <input type="text" class="form-control" id="#" name="user" placeholder="usuário" style="background: white">
                                        <input type="password" class="form-control senha" id="#" name="senha" placeholder="senha" style="background: white">
                                        <button type="submit" class="btn btn-primary entrar">ENTRAR</button>
                                        <?php if (!empty($_SESSION['ErroLogin'])): ?>
                                        <span style="text-align: center; color: red">
                                            <?= $_SESSION['ErroLogin'] ?>
                                        </span>
                                        <?php endif ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!--Fechamento do Container-->
            </div> 
        </div>
    </div>
    <!--Fim da Área do Formulário-->


    <!--Início Footer-->
    <?php include '_includes/footer.php'; ?>
    <!--Fim do Footer-->
</body>
</html>

