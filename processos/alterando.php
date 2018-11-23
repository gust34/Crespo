<?php

session_start();

include_once("Conexao.php");

 
  $nome = mysqli_real_escape_string($conexao,$_POST['nome']);
  $tipo = mysqli_real_escape_string($conexao,$_POST['tipo']);
  $categoria = mysqli_real_escape_string($conexao,$_POST['categoria']);
  $bairro = mysqli_real_escape_string($conexao,$_POST['bairro']);
  $qsuite = mysqli_real_escape_string($conexao,$_POST['qsuite']);
  $qquarto = mysqli_real_escape_string($conexao,$_POST['qquarto']);
  $areatotal = mysqli_real_escape_string($conexao,$_POST['areatotal']);
  $areaconstruida = mysqli_real_escape_string($conexao,$_POST['areaconstruida']);
  $qvaga = mysqli_real_escape_string($conexao,$_POST['qvaga']);
  $qbanheiro = mysqli_real_escape_string($conexao,$_POST['qbanheiro']);
  $crad = mysqli_real_escape_string($conexao,$_POST['crad']);
  $cond = mysqli_real_escape_string($conexao,$_POST['cond']);
  $cad1 = mysqli_real_escape_string($conexao,$_POST['cad1']);
  $cad2 = mysqli_real_escape_string($conexao,$_POST['cad2']);
  $cad3 = mysqli_real_escape_string($conexao,$_POST['cad3']);
  $cad4 = mysqli_real_escape_string($conexao,$_POST['cad4']);
  $cad5 = mysqli_real_escape_string($conexao,$_POST['cad5']);
  $cad6 = mysqli_real_escape_string($conexao,$_POST['cad6']);
  $cad7 = mysqli_real_escape_string($conexao,$_POST['cad7']);
  $cad8 = mysqli_real_escape_string($conexao,$_POST['cad8']);
  $cad9 = mysqli_real_escape_string($conexao,$_POST['cad9']);
  $cad10 = mysqli_real_escape_string($conexao,$_POST['cad10']);
  $descricao = mysqli_real_escape_string($conexao,$_POST['descricao']);
  //$foto = mysqli_real_escape_string($conexao,$_POST['foto']);
  
 $comando = "UPDATE imoveis SET tipo='$tipo', categoria='$categoria', bairro='$bairro', qsuite='$qsuite', qquarto='$qquarto', areatotal='$areatotal', areaconstruida='$areaconstruida', qvaga='$qvaga', qbanheiro='$qbanheiro', crad='$crad', cond='$cond', cad1='$cad1', cad2='$cad2', cad3='$cad3', cad4='$cad4', cad5='$cad5', cad6='$cad6', cad7='$cad7', cad8='$cad8', cad9='$cad9', cad10='$cad10', descricao='$descricao' WHERE nome='$nome'";
  
  if(mysqli_query($conexao,$comando))
  {
  // Se inserir
  
  $_SESSION['Erro'] = "Sucesso ao alterar";
    //manda para a mesma tela ou outra se der bom
   Header("Location: ola.php");
  }
  else
  {
  // Se der ruim 
  
  $_SESSION['Erro'] = "Erro alterar";
	Header("Location: area_restrita_cadastro.php");
  }
  ?>
