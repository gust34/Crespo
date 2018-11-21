<?php
session_start();
require 'processos/conexao.php';

if (!is_numeric(@$_GET['cod']) or empty($_GET['cod'])) {
    $_SESSION['error'] = 'Imóvel inválido.';
    echo $_SESSION['error'];
    // header('Location: index.php');
    exit();
} else {
    $sql = "SELECT * FROM Imoveis WHERE IMO_COD='{$_GET['cod']}' LIMIT 1";
    $result = mysqli_query($conexao, $sql);
    $resultado = mysqli_fetch_assoc($result);
}
