<?php
session_start();
require("Autoload.php");
use Connection\Connection;

try {
    $query = "UPDATE imoveis SET ";
    $vars = array();

    if(!empty($_POST['nome'])) {
        $query .= "IMO_NOME = @nomeVAR";
        $vars['@nomeVAR'] = $_POST['nome']; 
    }

    if(!empty($_POST['tipo'])) {
        $query .= ",IMO_TIPO = @tipoVAR";
        $vars['@tipoVAR'] = $_POST['tipo'];
    }

    if(!empty($_POST['cad'])) {
        $caract = serialize($_POST['cad']);
        $query .= ",IMO_CATEGORIA = @categoriaVAR";
        $vars['@categoriaVAR'] = $caract; 
    }

    if(!empty($_POST['bairro'])) {
        $query .= ",IMO_BAIRRO = @bairroVAR";
        $vars['@bairroVAR'] = $_POST['bairro']; 
    }

    if(!empty($_POST['qsuite'])) {
        $query .= ",IMO_SUITES = @suiteVAR";
        $vars['@suiteVAR'] = $_POST['qnome']; 
    }

    if(!empty($_POST['qquarto'])) {
        $query .= ",IMO_QUARTOS = @quartoVAR";
        $vars['@quartoVAR'] = $_POST['qquarto']; 
    }

    if(!empty($_POST['areatotal'])) {
        $query .= ",IMO_AREA_TOTAL = @areatotalVAR";
        $vars['@areatotalVAR'] = $_POST['areatotal']; 
    }

    if(!empty($_POST['areaconstruida'])) {
        $query .= ",IMO_AREA_CONSTRUIDA = @areaconstruidaVAR";
        $vars['@areacontruidaVAR'] = $_POST['areaconstruida']; 
    }

    if(!empty($_POST['reformas'])) {
        $query .= ",IMO_REFORMAS = @reformaVAR";
        $vars['@reformaVAR'] = $_POST['reformas']; 
    }

    if(!empty($_POST['qvaga'])) {
        $query .= ",IMO_VAGAS = @vagaVAR";
        $vars['@vagaVAR'] = $_POST['qvaga']; 
    }

    if(!empty($_POST['qbanheiro'])) {
        $query .= ",IMO_BANHEIROS = @banheiroVAR";
        $vars['@banheiroVAR'] = $_POST['qbanheiro']; 
    }

    if(!empty($_POST['crad'])) {
        $query .= ",IMO_CONDOMINIO = @cradVAR";
        $vars['@cradVAR'] = $_POST['crad']; 
    }

    if(!empty($_POST['cond'])) {
        $query .= ",IMO_ENDERECO_CONDOMINIO = @condVAR";
        $vars['@condVAR'] = $_POST['cond']; 
    }

    if(!empty($_POST['qquarto'])) {
        $query .= ",IMO_CARACTERISTICAS = @quartoVAR";
        $vars['@quartoVAR'] = $_POST['qquarto']; 
    }

    if(!empty($_POST['descricao'])) {
        $query .= ",IMO_DESCRICAO = @descricaoVAR";
        $vars['@descricaoVAR'] = $_POST['descricao']; 
    }

    if(!empty($_POST['PrecoDeVenda'])) {
        $query .= ",IMO_PRECO_VENDA = @precodevendaVAR";
        $vars['@precodevendaVAR'] = $_POST['PrecoDeVenda']; 
    }

    if(!empty($_POST['PrecoDeAluguel'])) {
        $query .= ",IMO_PRECO_ALUGUEL = @precodealuguelVAR";
        $vars['@precodealuguelVAR'] = $_POST['PrecoDeAluguel']; 
    }

    if(!empty($_POST['destaque'])) {
        $query .= ",IMO_DESTAQUE = @destaqueVAR";
        $vars['@destaqueVAR'] = $_POST['destaque']; 
    }

    if(!empty($_POST['ativo'])) {
        $query .= ",IMO_ATIVO = @ativoVAR";
        $vars['@ativoVAR'] = $_POST['ativo']; 
    }

    if(!empty($_POST['foto'])) {
        $query .= ",IMO_FOTOS = @fotoVAR";
        $vars['@fotoVAR'] = $_POST['foto']; 
    }

    if(!empty($_POST['situacao'])) {
        $query .= ",IMO_SITUACAO = @situacaoVAR";
        $vars['@situacaoVAR'] = $_POST['situacao']; 
    }

    $query.="WHERE Cod_Im = ".$_POST['Cod_Im'];

    $con = new Connection('bdcrespo');
    $con->dbExec($query, $vars);
} catch (Exception $e) {
    exit('Ocorreu um erro interno, contate o suporte.');
}

?>
