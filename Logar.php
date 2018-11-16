<?php
session_start();
include_once("Conexao.php");

if ((!empty($_POST)) && (!empty($_POST['user'])) && (!empty($_POST['senha'])))	
{
	$usuario = mysqli_real_escape_string($conexao, $_POST['user']);
	$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
	$sql = "SELECT * FROM login WHERE  user = '$usuario' && senha = '$senha' LIMIT 1";
	$result = mysqli_query($conexao, $sql);
	$resultado = mysqli_fetch_assoc($result);
	if(empty($resultado))
	{

		$_SESSION['ErroLogin'] = "Usuário ou Senha Inválidos";
		/*Se der ruim continua na tela login*/
		header ("Location: area_restrita_login.php");
	}
	else
	{
		
		$_SESSION['user'] = $usuario;
		/*Se der bom, manda para a tela de administrador,que gerencia tudo*/
		header("Location: area_restrita_cadastro.php");
		
	}
}	

