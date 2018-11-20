<?php session_start(); ?>
<!Doctype html>
<html>
<head>
    <title> Área Restrita </title>
    <link rel="Stylesheet" href="css/bootstrap.min.css">
    <link rel="Stylesheet" href="css/style_restricted_area.css">
    <meta charset="utf-8">
</head>
<body>
    <!--Top bar-->   
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
    </div>

    <!-- Início da área da tabela -->
    <section class="section-table">
        <div class="row">
            <div class="col-sm-3 text-center pt-2">Bem-vinda, Danila!</div>
            <div class="button col-sm-3 offset-md-6 text-center">
                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalcadastro">+Adicionar Imóvel</button>
            </div>
        </div>

        <div class="row justify-content-center mt-4" id="tabela">
            <div class="col-sm-11 table1">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"  style="width: 20%">Destaque</th>
                            <th scope="col">Código</th>
                            <th scope="col" style="width: 30%">Título</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Categoria</th>
                            <th scope="col" style="width: 20%">Situação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><input type="checkbox" id="#"></th>
                            <td>001</td>
                            <td>Casa no Colinos</td>
                            <td>Casa</td>
                            <td>Venda</td>
                            <td>Em negociação</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!--Fim da área da tabela-->

    <!--MODAL DE CADASTRO-->
    <div class="modal fade bd-example-modal-lg" id="modalcadastro" tabindex="0" role="dialog" aria-labelledby="modalcadastro"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalcadastro">Cadastro de Imóveis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="cadastro_imovel" method="POST" action="processos/cadastrar.php" enctype="multipart/form-data">
                        <input type="text" id="#" class="form-control" name="nome" placeholder="Título" size="50" required>

                        <div class="row justify-content-center">
                            <select name="tipo" id="#" class="form-control form-control-md mt-3 mr-5" style="width: 20%; float: left;" required>
                                <option value="" selected disabled> Tipo </option>
                                <option value="Casa">Casa</option>
                                <option value="Apartamento">Apartamento</option>
                                <option value="Barracão">Barracão</option>
                                <option value="Comercial">Comercial</option>
                                <option value="KitNet">Kitnet</option>
                            </select>

                            <select name="categoria" id="#" class="form-control form-control-md mt-3 mr-5" style="width: 20%; float: left;" required>
                                <option value="" selected disabled> Categoria </option>
                                <option value="Comprar">Comprar</option>
                                <option value="Alugar">Alugar</option>
                                <option value="Lançamentos">Lançamentos</option>
                                <option value="Rural">Rural</option>
                            </select>
                            <input type="text" class="form-control mt-3" placeholder="Bairro" style="width: 20%;" name="bairro" id="#" required>
                        </div>

                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-6 text-center">
                                <h6 class=""> Dormitórios </h6>
                                <div class="row justify-content-center">
                                    <div class="col-sm-3"> 
                                        <input type="text" class="form-control" id="#" name="suites" placeholder="Suítes" style="width: 120%;" required> 
                                    </div>
                                    <div class="col-sm-3"> 
                                        <input type="text" class="form-control" id="#" name="quartos" placeholder="Quartos" style="width: 120%;" required> 
                                    </div> 
                                </div>
                            </div>
                            
                            <div class="col-sm-6 text-center">
                                <h6 class=""> Área </h6>
                                <div class="row justify-content-center">
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="#" name="area_total" placeholder="Total" style="width: 120%;" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="#" name="area_construida" placeholder="Construída" style="width:150%;" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-6 text-center">
                                <h6 class=""> Outros </h6>
                                <div class="row justify-content-center P-0">
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="#" name="banheiros" placeholder="WC" style="width: 120%;" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="#" name="vagas" placeholder="Vagas" style="width:120%;" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-8 text-center">
                                <h6 class=""> Condomínio? </h6>
                                <div class="row justify-content-center P-0" style="margin-left: -30%;">
                                    <div class="col-sm-2">
                                        <input class="form-check-input" type="radio" id="#" name="condominio" value="1"> Sim 
                                    </div>
                                    <div class="col-sm-4" style="margin-left: -6%;">
                                        <input class="form-control" type="text" id="#" name="endereco_condominio" placeholder="Condomínio" style="width: 180%;"> 
                                    </div>
                                    <div class="col-sm-2">
                                        <input class="form-check-input" type="radio" id="#" name="condominio" value="0" style="margin-left: 95%;" checked> <span style="margin-left: 200%">Não</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-8 text-center">
                                <h6 class=""> Características </h6>
                                <div class="row justify-content-center P-0" style="margin-left: -23%; margin-bottom: 3%;">
                                    <div class="col-sm-4 offset-md-2">
                                        <input type="text" class="form-control" id="#" name="cad[1]" placeholder="Característica 1" required> 
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="#" name="cad[6]" placeholder="Característica 6" required>

                                    </div>
                                </div>
                                <div class="row justify-content-center P-0" style="margin-left: -23%; margin-bottom: 3%;">
                                    <div class="col-sm-4 offset-md-2">
                                        <input type="text" class="form-control" id="#" name="cad[2]" placeholder="Característica 2" required> 
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="#" name="cad[7]" placeholder="Característica 7" required>
                                    </div>
                                </div>
                                <div class="row justify-content-center P-0" style="margin-left: -23%; margin-bottom: 3%; ">
                                    <div class="col-sm-4 offset-md-2">
                                        <input type="text" class="form-control" id="#" name="cad[3]" placeholder="Característica 3"> 
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="#" name="cad[8]" placeholder="Característica 8">
                                    </div>
                                </div>
                                <div class="row justify-content-center P-0" style="margin-left: -23%; margin-bottom: 3%;">
                                    <div class="col-sm-4 offset-md-2">
                                        <input type="text" class="form-control" id="#" name="cad[4]" placeholder="Característica 4"> 
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="#" name="cad[9]" placeholder="Característica 9">
                                    </div>
                                </div>
                                <div class="row justify-content-center P-0" style="margin-left: -23%; margin-bottom: 3%;">
                                    <div class="col-sm-4 offset-md-2">
                                        <input type="text" class="form-control" id="#" name="cad[5]" placeholder="Característica 5"> 
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="#" name="cad[10]" placeholder="Característica 10">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-6 text-center">
                                <h6 class=""> Preços </h6>
                                <div class="row justify-content-center">
                                    <div class="col-sm-3"> 
                                        <input type="text" class="form-control" id="#" name="preco_aluguel" placeholder="Aluguel" style="width: 120%;" required> 
                                    </div>
                                    <div class="col-sm-3"> 
                                        <input type="text" class="form-control" id="#" name="preco_venda" placeholder="Venda" style="width: 120%;" required> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-5 text-center">
                                <h6 class=""> Reformas </h6>
                                <div class="row justify-content-center">
                                    <div class="col-sm-5" style="margin-left: -4%;"> 
                                        <input type="text" class="form-control" id="#" name="reformas" placeholder="Qtd Reformas" style="width: 120%;" required> 
                                    </div>             
                                </div>
                            </div>
                        </div>  
                        <div class="row justify-content-center">
                            <div class="col-sm-8 mt-3">
                                <textarea class="form-control" name="descricao" required> Descrição </textarea>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3 offset-md-2">
                            <div class="col-sm-4 mt-3 pl-5">
                                <h6  style="margin-left: 14%;">Enviar Imagem</h6>
                            </div>
                            <div class="col-sm-8 mt-3 pl-3">
                                <input type="file" name="foto0" id="#" class="#"  accept="image/png, image/jpeg" multiple required> 
                                <input type="hidden" name="MAX_FILE_SIZE" value="122500"/>      
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-sm-12 mt-3 text-center">
                                <button type="submit" class="btn btn-primary" id="#" name="">Cadastrar Imóvel</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!--MODAL DE ALTERAR **NÃO FINALIZADO**-->
    <div class="modal fade bd-example-modal-lg" id="modalcadastro" tabindex="0" role="dialog" aria-labelledby="modalcadastro"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalcadastro">Cadastro de Imóveis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="cadastro_imovel" method="POST" action="Cadastrar.php">
                        <input type="text" id="#" class="form-control" name="nome" placeholder="Título" size="50"
                            required>

                        <div class="row justify-content-center">

                            <select name="tipo" id="#" class="form-control form-control-md mt-3 mr-5" style="width: 20%; float: left;"
                                required>
                                <option value="" selected disabled> Tipo </option>
                                <option value="Casa">Casa</option>
                                <option value="Apartamento">Apartamento</option>
                                <option value="Barracão">Barracão</option>
                                <option value="Comercial">Comercial</option>
                                <option value="KitNet">Kitnet</option>
                            </select>

                            <select name="categoria" id="#" class="form-control form-control-md mt-3 mr-5" style="width: 20%; float: left;"
                                required>
                                <option value="" selected disabled> Categoria </option>
                                <option value="Comprar">Comprar</option>
                                <option value="Alugar">Alugar</option>
                                <option value="Lançamentos">Lançamentos</option>
                                <option value="Rural">Rural</option>
                            </select>


                            <input type="text" class="form-control mt-3" placeholder="Bairro" style="width: 20%;" name="bairro"
                                id="#" required>

                        </div>

                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-6 text-center">
                                <h6 class=""> Dormitórios </h6>
                                <div class="row justify-content-center">
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="#" name="qsuite" placeholder="Suítes"
                                            style="width: 120%;" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="#" name="qquarto" placeholder="Quartos"
                                            style="width: 120%;" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 text-center">
                                <h6 class=""> Área </h6>
                                <div class="row justify-content-center">
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="#" name="areatotal" placeholder="Total" style="width: 120%;" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="#" name="areaconstruida" placeholder="Construída" style="width:150%;" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-6 text-center">
                                <h6 class=""> Outros </h6>
                                <div class="row justify-content-center P-0">
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="#" name="qbanheiro" placeholder="WC" style="width: 120%;" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="#" name="qvaga" placeholder="Vagas" style="width:120%;" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-8 text-center">
                                <h6 class=""> Condomínio? </h6>
                                <div class="row justify-content-center P-0" style="margin-left: -30%;">
                                    <div class="col-sm-2">
                                        <input class="form-check-input" type="radio" id="#" name="crad" value="sim"> Sim
                                    </div>
                                    <div class="col-sm-4" style="margin-left: -6%;">
                                        <input class="form-control" type="text" id="#" name="cond" placeholder="Condomínio" style="width: 180%;"> </div>
                                    <div class="col-sm-2">
                                        <input class="form-check-input" type="radio" id="#" name="crad" value="nao" style="margin-left: 95%;" checked> <span style="margin-left: 200%">Não</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-8 text-center">
                                <h6 class=""> Características </h6>
                                <div class="row justify-content-center P-0" style="margin-left: -23%; margin-bottom: 3%;">
                                    <div class="col-sm-4 offset-md-2">
                                        <input type="text" class="form-control" id="#" name="cad1" placeholder="Característica 1" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="#" name="cad6" placeholder="Característica 6" required>
                                    </div>
                                </div>
                                <div class="row justify-content-center P-0" style="margin-left: -23%; margin-bottom: 3%;">
                                    <div class="col-sm-4 offset-md-2">
                                        <input type="text" class="form-control" id="#" name="cad2" placeholder="Característica 2" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="#" name="cad7" placeholder="Característica 7" required>
                                    </div>
                                </div>
                                <div class="row justify-content-center P-0" style="margin-left: -23%; margin-bottom: 3%; ">
                                    <div class="col-sm-4 offset-md-2">
                                        <input type="text" class="form-control" id="#" name="cad3" placeholder="Característica 3">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="#" name="cad8" placeholder="Característica 8">
                                    </div>
                                </div>
                                <div class="row justify-content-center P-0" style="margin-left: -23%; margin-bottom: 3%;">
                                    <div class="col-sm-4 offset-md-2">
                                        <input type="text" class="form-control" id="#" name="cad4" placeholder="Característica 4">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="#" name="cad9" placeholder="Característica 9">
                                    </div>
                                </div>
                                <div class="row justify-content-center P-0" style="margin-left: -23%; margin-bottom: 3%;">
                                    <div class="col-sm-4 offset-md-2">
                                        <input type="text" class="form-control" id="#" name="cad5" placeholder="Característica 5">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="#" name="cad10" placeholder="Característica 10">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-6 text-center">
                                <h6 class=""> Preços </h6>
                                <div class="row justify-content-center">
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="#" name="PrecoDeAluguel" placeholder="Aluguel" style="width: 120%;" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="#" name="PrecoDeVenda" placeholder="Venda" style="width: 120%;" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-5 text-center">
                                <h6 class=""> Reformas </h6>
                                <div class="row justify-content-center">
                                    <div class="col-sm-5" style="margin-left: -4%;">
                                        <input type="text" class="form-control" id="#" name="reformas" placeholder="Qtd Reformas" style="width: 120%;" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-sm-8 mt-3">
                                <textarea class="form-control" name="descricao" form="cadastro_imovel" id="#" required> Descrição </textarea>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3 offset-md-2">
                            <div class="col-sm-4 mt-3 pl-5">
                                <h6 style="margin-left: 14%;">Enviar Imagem</h6>
                            </div>
                            <div class="col-sm-8 mt-3 pl-3">
                                <input type="file" name="foto" id="#" class="#" accept="image/png, image/jpeg" multiple required>
                                <input type="hidden" name="MAX_FILE_SIZE" value="122500" />
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-sm-12 mt-3 text-center">
                                <button type="submit" class="btn btn-primary" id="#" name=""> Cadastrar Imóvel </button>
                            </div>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>





    <!--Footer-->

    <div class="rodape-baixo">
        <div class="row justify-content-center">
            <div class="col-sm-3 ml-5 pl-5 mt-4">
                <img src="img/logo.png" class="logo-rodape">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-3 ml-5 pl-5 mt-5">
                <span class="ml-4"> Horário de Funcionamento </span><br>
                <span class="text-center"> Segunda à sexta das 06:00 às 17:30 </span>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-4 ml-5 pl-5 mt-4 mb-3">
                <span class="text-center ml-3"> DESENVOLVIDO POR I AM IAN WEB DESIGN </span>
            </div>
        </div>
    </div>

    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</head>
