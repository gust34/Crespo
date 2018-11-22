<?php
require 'processos/Autoload.php';
use Connection\Connection;

/**
 * Carrega lista de imóveis cadastrados
 */

try {
    $query = 'SELECT * FROM Imoveis WHERE IMO_ATIVO = TRUE';
    $con = new Connection('bdcrespo');
    $imoveis = $con->dbExec($query);

    if (!isset($imoveis[0]) and !empty($imoveis)) {
        $back = $imoveis;
        $imoveis = null;
        $imoveis[0] = $back;
        unset($back);
    }
} catch (Exception $e) {
    exit('Ocorreu um erro interno, por favor, contate o suporte.');
}
