<?php
session_start();
require 'Autoload.php';
use Connection\Connection;

if (!isset($_GET['cod'])) {
    header('Location: ../index.php');
    exit();
}
if (!$_SESSION['user'] or !is_numeric($_GET['cod'])) {
    header('Location: ../index.php');
    exit();
} else {
    try {
        $query = 'UPDATE Imoveis SET IMO_ATIVO = FALSE WHERE IMO_COD = @cVAR';
        $vars = array('@cVAR' => (int) $_GET['cod']);

        $con = new Connection('bdcrespo');
        $con->dbExec($query, $vars);
    } catch (Exception $e) {
        $_SESSION['Erro'] = 'Ocorreu um erro interno, contate o suporte.';
    }
}

header('Location: ../area_restrita_cadastro.php');
