<?php
session_start();
include_once("Conexao.php");

$sql = "SELECT * FROM imoveis WHERE Cod_Im='$Cod' LIMIT 1";
$result = mysqli_query($conexao, $sql);
$resultado = mysqli_fetch_assoc($result);
?>
