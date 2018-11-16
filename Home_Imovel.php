<?php
session_start();
include_once("Conexao.php");

	$sql = "SELECT * FROM imoveis WHERE home='1' LIMIT 6";
	$result = mysqli_query($conexao, $sql);
	$Destaque = mysqli_fetch_assoc($result);
?>
