<?php
require 'processos/Autoload.php';
use Connection\Connection;

/**
 * Carrega lista de imóveis cadastrados
 */

try {
    $query = 'SELECT * FROM Imoveis WHERE IMO_ATIVO = TRUE';
    $vars = array();



    if (!empty($_POST['categoria']) and $_POST['categoria'] != 'Geral') {
        $query .= ' AND IMO_CATEGORIA = @categVAR';
        $vars['@categVAR'] = $_POST['categoria'];
    }
    if (!empty($_POST['nome'])) {
        $query .= ' AND (IMO_NOME LIKE @nomeVAR OR IMO_BAIRRO LIKE @nomeVAR)';
        $vars['@nomeVAR'] = '%' . $_POST['nome'] . '%';
    }
    if (!empty($_POST['tipo'])) {
        $query .= ' AND IMO_TIPO = @tipoVAR';
        $vars['@tipoVAR'] = $_POST['tipo'];
    }
    


    $con = new Connection('bdcrespo');
    $imoveis = $con->dbExec($query, $vars);

    if (!isset($imoveis[0]) and !empty($imoveis)) {
        $back = $imoveis;
        $imoveis = null;
        $imoveis[0] = $back;
        unset($back);
    }
} catch (Exception $e) {
    exit('Ocorreu um erro interno, por favor, contate o suporte.');
}
