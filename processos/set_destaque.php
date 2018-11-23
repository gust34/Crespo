<?php
require 'Autoload.php';
use Connection\Connection;

$cod = $_POST['cod'];

try {
    $query = "UPDATE Imoveis SET IMO_DESTAQUE = {$_POST['value']} WHERE IMO_COD = @codVAR";
    $vars = array(
        '@codVAR' => $cod
    );

    $con = new Connection('bdcrespo');
    $con->dbExec($query, $vars);
    echo 'OK';
} catch (Exception $e) {
    exit('Ocorreu um erro interno, por favor, contate o suporte.');
}
