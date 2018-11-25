<?php
session_start();
require 'Autoload.php';
use Connection\Connection;

try {
    $query = 'SELECT * FROM Imoveis WHERE IMO_COD = @codVAR';
    $vars = ['@codVAR' => $_POST['cod']];

    $con = new Connection('bdcrespo');
    $data = $con->dbExec($query, $vars);

    $data['IMO_CARACTERISTICAS'] = unserialize($data['IMO_CARACTERISTICAS']);
    $data['IMO_FOTOS'] = unserialize($data['IMO_FOTOS']);
    $data['IMO_DESCRICAO'] = utf8_decode($data['IMO_DESCRICAO']);

    // print_r($data);

    echo json_encode($data);
} catch (Exception $e) {
    exit('Desculpe, ocorreu um erro interno. Contate o suporte.');
}
