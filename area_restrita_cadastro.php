<?php 
session_start();
if (empty($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
require 'processos/load_imoveis.php';
?>
<!Doctype html>
<html>
<head>
    <title> Área Restrita </title>
    <link rel="Stylesheet" href="css/bootstrap.min.css">
    <link rel="Stylesheet" href="css/style_restricted_area.css">
    <link rel="Stylesheet" href="css/included_styles.css">
    <meta charset="utf-8">
</head>
<body>
    <div id="loading" style="position: absolute; top: 0; left: 0; display: none; width: 100%; height: 100%; z-index: 1000; background: rgba(0, 0, 0, 0.6);">
        <div style="background: white; width: 25%; position: absolute; left: 37.5%; top: 10em; padding: 2em; text-align: center">
            Aguarde...
        </div>
    </div>
    <!--Top bar-->   
	<?php include '_includes/menu.php'; ?>

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
                            <th scope="col" style="width: 25%">Título</th>
                            <th scope="col" style="width: 12%;">Tipo</th>
                            <th scope="col" style="width: 15%;">Categoria</th>
                            <th scope="col" style="width: 12%">Situação</th>
                            <th scope="col" style="width: 20%"></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($imoveis)): ?>
                            <?php foreach($imoveis as $imovel): ?>
                            <?php
                            $status = null;
                            switch ($imovel['IMO_SITUACAO']) {
                                case 1:
                                    $status = 'Vigente';
                                    break;
                                case 2:
                                    $status = 'Em negociação';
                                    break;
                                case 3:
                                    $status = 'Alugado';
                                    break;
                                case 4:
                                    $status = 'Vendido';
                                    break;
                            }
                            ?>
                            <tr>
                                <th scope="row"><input type="checkbox" class="checkboxDestaque" onclick="setDestaque('<?=$imovel['IMO_COD']?>', this.checked);" <?=$imovel['IMO_DESTAQUE'] ? 'checked' : ''?>></th>
                                <td><?=$imovel['IMO_COD']?></td>
                                <td><?=$imovel['IMO_NOME']?></td>
                                <td><?=$imovel['IMO_TIPO']?></td>
                                <td><?=$imovel['IMO_CATEGORIA']?></td>
                                <td><?=$status?> </td>
                                <td> <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaleditar" onclick="getImovelToChange(<?=$imovel['IMO_COD']?>)">Editar</button>
                                <a type="submit" class="btn btn-primary btn-sm" href="processos/excluir.php?cod=<?=$imovel['IMO_COD']?>">Remover</a> <td>
                            </tr>
                            <?php endforeach ?>
                        <?php else: ?>
                        <tr>
                            <th>Não há imóveis cadastrados</th>
                        </tr>
                        <?php endif ?>
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
                                <option value="Barracao">Barracão</option>
                                <option value="Comercial">Comercial</option>
                                <option value="KitNet">Kitnet</option>
                            </select>

                            <select name="categoria" id="#" class="form-control form-control-md mt-3 mr-5" style="width: 20%; float: left;" required>
                                <option value="" selected disabled> Categoria </option>
                                <option value="Comprar">Comprar</option>
                                <option value="Alugar">Alugar</option>
                                <option value="Lancamentos">Lançamentos</option>
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
                                        <input type="text" class="form-control" id="#" name="cad[1]" placeholder="Característica 1"> 
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="#" name="cad[2]" placeholder="Característica 2">
                                    </div>
                                </div>
                                <div class="row justify-content-center P-0" style="margin-left: -23%; margin-bottom: 3%;">
                                    <div class="col-sm-4 offset-md-2">
                                        <input type="text" class="form-control" id="#" name="cad[3]" placeholder="Característica 3"> 
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="#" name="cad[4]" placeholder="Característica 4">
                                    </div>
                                </div>
                                <div class="row justify-content-center P-0" style="margin-left: -23%; margin-bottom: 3%; ">
                                    <div class="col-sm-4 offset-md-2">
                                        <input type="text" class="form-control" id="#" name="cad[5]" placeholder="Característica 5"> 
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="#" name="cad[6]" placeholder="Característica 6">
                                    </div>
                                </div>
                                <div class="row justify-content-center P-0" style="margin-left: -23%; margin-bottom: 3%;">
                                    <div class="col-sm-4 offset-md-2">
                                        <input type="text" class="form-control" id="#" name="cad[7]" placeholder="Característica 7"> 
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="#" name="cad[8]" placeholder="Característica 8">
                                    </div>
                                </div>
                                <div class="row justify-content-center P-0" style="margin-left: -23%; margin-bottom: 3%;">
                                    <div class="col-sm-4 offset-md-2">
                                        <input type="text" class="form-control" id="#" name="cad[9]" placeholder="Característica 9">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="#" name="cad[10]" placeholder="Característica 10">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row text-center mt-3">
                            <div class="col-sm-6 text-center">
                                <h6 class=""> Preço </h6>
                                <div class="row justify-content-center">
                                    <div class="col-sm-5"> 
                                        <input type="text" class="form-control" id="#" name="preco" style="width: 120%;" required> 
                                    </div>
                                    <div class="col-sm-10"> 
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="a_venda" id="a_venda" value="1" checked>
                                            <label class="form-check-label" for="a_venda">
                                                A venda
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="a_venda" id="a_alugar" value="0">
                                            <label class="form-check-label" for="a_alugar">
                                                A alugar
                                            </label>
                                        </div>
                                    </div>    
                                </div>
                            </div>

                            <div class="col-sm-6 text-center">
                                <h6 class=""> Reformas </h6>
                                <div class="row justify-content-center">
                                    <div class="col-sm-6"> 
                                        <input type="text" class="form-control" id="#" name="reformas" placeholder="Qtd Reformas" style="width: 120%;" required> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row text-center mt-3">
                            <div class="col-sm-6 text-center">
                                <div class="row justify-content-center">
                                    <div class="col-sm-6"> 
                                        <select name="situacao" id="#" class="form-control form-control-md mt-3 mr-5" required>
                                            <option value="" selected disabled> Situação </option>
                                            <option value="Comprar">Vigente</option>
                                            <option value="Alugar">Em negociação</option>
                                            <option value="Lancamentos">Finalizado</option>
                                        </select>
                                    </div>    
                                </div>
                            </div>

                            <div class="col-sm-6 text-center">
                                <h6 class=""> Destaque? </h6>
                                <div class="row justify-content-center">
                                    <div class="col-sm-3"> 
                                        <input class="form-check-input" type="radio" id="#" name="destaque" value="1"> Sim 
                                    </div>
                                    <div class="col-sm-3"> 
                                        <input class="form-check-input" type="radio" id="#" name="destaque" value="0"> Não 
                                    </div>
                                </div>
                            </div>
                        </div>                          

                        <div class="row justify-content-center">
                            <div class="col-sm-8 mt-3">
                                <textarea class="form-control" name="descricao" placeholder="Descrição" required></textarea>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3 offset-md-2">
                            <div class="col-sm-9 mt-3 pl-5">
                                <h6  style="margin-left: 14%;">Enviar Imagem</h6>
                                <div class="col-sm-8 mt-3 pl-3">
                                    <input type="file" name="foto0" id="#" class="#"  accept="image/png, image/jpeg" multiple required> 
                                    <input type="hidden" name="MAX_FILE_SIZE" value="122500"/>      
                                </div>
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

    <!-- ********************* MODAL DE ALTERAR ************************ -->
    <!-- ********************* MODAL DE ALTERAR ************************ -->
    <!-- ********************* MODAL DE ALTERAR ************************ -->
    <!-- ********************* MODAL DE ALTERAR ************************ -->
    <!-- ********************* MODAL DE ALTERAR ************************ -->
    <!-- ********************* MODAL DE ALTERAR ************************ -->
    <!-- ********************* MODAL DE ALTERAR ************************ -->
    <!-- ********************* MODAL DE ALTERAR ************************ -->
    <!-- ********************* MODAL DE ALTERAR ************************ -->
    <div class="modal fade bd-example-modal-lg" id="modaleditar" tabindex="0" role="dialog" aria-labelledby="modalcadastro" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalcadastro">Alterar Imóvel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="alterar_imovel" method="POST" action="processos/change_imoveis.php" enctype="multipart/form-data">
                        <input type="hidden" name="cod" id="targetCod">
                        <input type="text" id="altNome" class="form-control" name="nome" placeholder="Título" size="50" required>

                        <div class="row justify-content-center">
                            <select name="tipo" id="altTipo" class="form-control form-control-md mt-3 mr-5" style="width: 20%; float: left;" required>
                                <option value="" selected disabled> Tipo </option>
                                <option value="Casa">Casa</option>
                                <option value="Apartamento">Apartamento</option>
                                <option value="Barracao">Barracão</option>
                                <option value="Comercial">Comercial</option>
                                <option value="KitNet">Kitnet</option>
                            </select>

                            <select name="categoria" id="altCategoria" class="form-control form-control-md mt-3 mr-5" style="width: 20%; float: left;" required>
                                <option value="" selected disabled> Categoria </option>
                                <option value="Comprar">Comprar</option>
                                <option value="Alugar">Alugar</option>
                                <option value="Lancamentos">Lançamentos</option>
                                <option value="Rural">Rural</option>
                            </select>
                            <input type="text" class="form-control mt-3" placeholder="Bairro" style="width: 20%;" name="bairro" id="altBairro" required>
                        </div>

                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-6 text-center">
                                <h6 class=""> Dormitórios </h6>
                                <div class="row justify-content-center">
                                    <div class="col-sm-3"> 
                                        <input type="text" class="form-control" id="altSuites" name="suites" placeholder="Suítes" style="width: 120%;" required> 
                                    </div>
                                    <div class="col-sm-3"> 
                                        <input type="text" class="form-control" id="altQuartos" name="quartos" placeholder="Quartos" style="width: 120%;" required> 
                                    </div> 
                                </div>
                            </div>
                            
                            <div class="col-sm-6 text-center">
                                <h6 class=""> Área </h6>
                                <div class="row justify-content-center">
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="altAreaTot" name="area_total" placeholder="Total" style="width: 120%;" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="altAreaConst" name="area_construida" placeholder="Construída" style="width:150%;" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-6 text-center">
                                <h6 class=""> Outros </h6>
                                <div class="row justify-content-center P-0">
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="altBanheiros" name="banheiros" placeholder="WC" style="width: 120%;" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="altVagas" name="vagas" placeholder="Vagas" style="width:120%;" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-8 text-center">
                                <h6 class=""> Condomínio? </h6>
                                <div class="row justify-content-center P-0" style="margin-left: -30%;">
                                    <div class="col-sm-2">
                                        <input class="form-check-input" type="radio" id="altCondominioS" name="condominio" value="1"> Sim 
                                    </div>
                                    <div class="col-sm-4" style="margin-left: -6%;">
                                        <input class="form-control" type="text" id="altEnd" name="endereco_condominio" placeholder="Condomínio" style="width: 180%;"> 
                                    </div>
                                    <div class="col-sm-2">
                                        <input class="form-check-input" type="radio" id="altCondominioN" name="condominio" value="0" style="margin-left: 95%;" checked> <span style="margin-left: 200%">Não</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-8 text-center">
                                <h6 class=""> Características </h6>
                                <div class="row justify-content-center P-0" style="margin-left: -23%; margin-bottom: 3%;">
                                    <div class="col-sm-4 offset-md-2">
                                        <input type="text" class="form-control" id="altCad1" name="cad[1]" placeholder="Característica 1"> 
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="altCad2" name="cad[2]" placeholder="Característica 2">
                                    </div>
                                </div>
                                <div class="row justify-content-center P-0" style="margin-left: -23%; margin-bottom: 3%;">
                                    <div class="col-sm-4 offset-md-2">
                                        <input type="text" class="form-control" id="altCad3" name="cad[3]" placeholder="Característica 3"> 
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="altCad4" name="cad[4]" placeholder="Característica 4">
                                    </div>
                                </div>
                                <div class="row justify-content-center P-0" style="margin-left: -23%; margin-bottom: 3%; ">
                                    <div class="col-sm-4 offset-md-2">
                                        <input type="text" class="form-control" id="altCad5" name="cad[5]" placeholder="Característica 5"> 
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="altCad6" name="cad[6]" placeholder="Característica 6">
                                    </div>
                                </div>
                                <div class="row justify-content-center P-0" style="margin-left: -23%; margin-bottom: 3%;">
                                    <div class="col-sm-4 offset-md-2">
                                        <input type="text" class="form-control" id="altCad7" name="cad[7]" placeholder="Característica 7"> 
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="altCad8" name="cad[8]" placeholder="Característica 8">
                                    </div>
                                </div>
                                <div class="row justify-content-center P-0" style="margin-left: -23%; margin-bottom: 3%;">
                                    <div class="col-sm-4 offset-md-2">
                                        <input type="text" class="form-control" id="altCad9" name="cad[9]" placeholder="Característica 9">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="altCad10" name="cad[10]" placeholder="Característica 10">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row text-center mt-3">
                            <div class="col-sm-6 text-center">
                                <h6 class=""> Preço </h6>
                                <div class="row justify-content-center">
                                    <div class="col-sm-5"> 
                                        <input type="text" class="form-control" id="altPreco" name="preco" style="width: 120%;" required> 
                                    </div>
                                    <div class="col-sm-10"> 
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="a_venda" id="a_venda" value="1" checked>
                                            <label class="form-check-label" for="a_venda">
                                                A venda
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="a_venda" id="a_alugar" value="0">
                                            <label class="form-check-label" for="a_alugar">
                                                A alugar
                                            </label>
                                        </div>
                                    </div>    
                                </div>
                            </div>

                            <div class="col-sm-6 text-center">
                                <h6 class=""> Reformas </h6>
                                <div class="row justify-content-center">
                                    <div class="col-sm-6"> 
                                        <input type="text" class="form-control" id="altReformas" name="reformas" placeholder="Qtd Reformas" style="width: 120%;" required> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row text-center mt-3">
                            <div class="col-sm-6 text-center">
                                <div class="row justify-content-center">
                                    <div class="col-sm-6"> 
                                        <select name="situacao" id="altSituacao" class="form-control form-control-md mt-3 mr-5" required>
                                            <option value="" selected disabled> Situação </option>
                                            <option value="1">Vigente</option>
                                            <option value="2">Em negociação</option>
                                            <option value="3">Finalizado</option>
                                        </select>
                                    </div>    
                                </div>
                            </div>

                            <div class="col-sm-6 text-center">
                                <h6 class=""> Destaque? </h6>
                                <div class="row justify-content-center">
                                    <div class="col-sm-3"> 
                                        <input class="form-check-input" type="radio" id="altDestS" name="destaque" value="1"> Sim 
                                    </div>
                                    <div class="col-sm-3"> 
                                        <input class="form-check-input" type="radio" id="altDestN" name="destaque" value="0"> Não 
                                    </div>
                                </div>
                            </div>
                        </div>                          

                        <div class="row justify-content-center">
                            <div class="col-sm-8 mt-3">
                                <textarea class="form-control" id="altDescricao" name="descricao" placeholder="Descrição" required></textarea>
                            </div>
                        </div>

                        <h5 style="margin-top: 2em; width: 100%; text-align: center;">Enviar Imagens</h5>
                        <div style="width: 100%; text-align: center;">
                            <strong>Envie apenas as imagens que você deseja alterar.</strong>
                        </div>
                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-6 mt-3 pl-5">
                                <div class="col-sm-8 mt-3 pl-3">
                                    <img src="" id="oldFoto0" class="oldPhoto">
                                    <input type="file" name="foto0" id="altFoto0" class="#"  accept="image/png, image/jpeg"> 
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3 pl-5">
                                <div class="col-sm-8 mt-3 pl-3">
                                    <img src="" id="oldFoto1" class="oldPhoto">
                                    <input type="file" name="foto1" id="altFoto1" class="#"  accept="image/png, image/jpeg"> 
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-6 mt-3 pl-5">
                                <div class="col-sm-8 mt-3 pl-3">
                                    <img src="" id="oldFoto2" class="oldPhoto">
                                    <input type="file" name="foto2" id="altFoto2" class="#"  accept="image/png, image/jpeg"> 
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3 pl-5">
                                <div class="col-sm-8 mt-3 pl-3">
                                    <img src="" id="oldFoto3" class="oldPhoto">
                                    <input type="file" name="foto3" id="altFoto3" class="#"  accept="image/png, image/jpeg"> 
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-6 mt-3 pl-5">
                                <div class="col-sm-8 mt-3 pl-3">
                                    <img src="" id="oldFoto4" class="oldPhoto">
                                    <input type="file" name="foto4" id="altFoto4" class="#"  accept="image/png, image/jpeg"> 
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3 pl-5">
                                <div class="col-sm-8 mt-3 pl-3">
                                    <img src="" id="oldFoto5" class="oldPhoto">
                                    <input type="file" name="foto5" id="altFoto5" class="#"  accept="image/png, image/jpeg"> 
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-6 mt-3 pl-5">
                                <div class="col-sm-8 mt-3 pl-3">
                                    <img src="" id="oldFoto6" class="oldPhoto">
                                    <input type="file" name="foto6" id="altFoto6" class="#"  accept="image/png, image/jpeg"> 
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3 pl-5">
                                <div class="col-sm-8 mt-3 pl-3">
                                    <img src="" id="oldFoto7" class="oldPhoto">
                                    <input type="file" name="foto7" id="altFoto7" class="#"  accept="image/png, image/jpeg"> 
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-6 mt-3 pl-5">
                                <div class="col-sm-8 mt-3 pl-3">
                                    <img src="" id="oldFoto8" class="oldPhoto">
                                    <input type="file" name="foto8" id="altFoto8" class="#"  accept="image/png, image/jpeg"> 
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3 pl-5">
                                <div class="col-sm-8 mt-3 pl-3">
                                    <img src="" id="oldFoto9" class="oldPhoto">
                                    <input type="file" name="foto9" id="altFoto9" class="#"  accept="image/png, image/jpeg"> 
                                </div>
                            </div>
                        </div>


                        <div class="row justify-content-center">
                            <div class="col-sm-12 mt-3 text-center">
                                <button type="submit" class="btn btn-primary" id="#" name="">Alterar dados</button>
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
    <?php include '_includes/footer.php'; ?>

    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/ajax.js"></script>
</body>
</head>
