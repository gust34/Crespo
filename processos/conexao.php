<?php

//variáveis com informações do banco

$bdservidor = '127.0.0.1';
$bdusuario = 'root';
$bdsenha = '';
$bdbanco = 'bdcrespo';

//Comando de conexão

$conexao = mysqli_connect($bdservidor, $bdusuario, $bdsenha, $bdbanco);

//Teste de conexão
if (mysqli_connect_errno($conexao)) {
	echo "Problemas ao conectar! Verifique a conexão.";
	die();		
}
?>
