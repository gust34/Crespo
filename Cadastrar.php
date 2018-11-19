<?php
session_start();


include_once 'Conexao.php';

//Variaveis com as Informações do formulario

$nome = mysqli_real_escape_string($conexao,$_POST['nome']);
$tipo = mysqli_real_escape_string($conexao,$_POST['tipo']);
$categoria = mysqli_real_escape_string($conexao,$_POST['categoria']);
$bairro = mysqli_real_escape_string($conexao,$_POST['bairro']);
$qsuite = mysqli_real_escape_string($conexao,$_POST['qsuite']);
$qquarto = mysqli_real_escape_string($conexao,$_POST['qquarto']);
$areatotal = mysqli_real_escape_string($conexao,$_POST['areatotal']);
$areaconstruida = mysqli_real_escape_string($conexao,$_POST['areaconstruida']);
$qvaga = mysqli_real_escape_string($conexao,$_POST['qvaga']);
$qreformas = mysqli_real_escape_string($conexao,$_POST['qreformas']);
$qbanheiro = mysqli_real_escape_string($conexao,$_POST['qbanheiro']);
$crad = mysqli_real_escape_string($conexao,$_POST['crad']);
$cond = mysqli_real_escape_string($conexao,$_POST['cond']);
$cad1 = mysqli_real_escape_string($conexao,$_POST['cad1']);
$descricao = mysqli_real_escape_string($conexao,$_POST['descricao']);
$foto = $_FILES['imagem']['tmp_name'];
$fototamanho = $_FILES['imagem']['size'];

// passar os parametros e arrumar o banco
// comando

if ($foto != 'none') {
    $fp = fopen($foto, 'rb');
    $conteudo = fread($fp, $fototamanho);
    $conteudo = addslashes($conteudo);
    fclose($fp);
}


$comando = "insert into imoveis(nome, 
                                tipo, 
                                categoria, 
                                bairro, 
                                qquarto, 
                                qsuite, 
                                areatotal, 
                                areaconstruida, 
                                qvaga, 
                                qreformas, 
                                qbanheiro, 
                                crad, 
                                cond, 
                                cad1, 
                                cad2, 
                                cad3, 
                                cad4, 
                                cad5, 
                                cad6, 
                                cad7, 
                                cad8, 
                                cad9, 
                                cad10, 
                                descricao, 
                                foto) 
                        VALUES ('$nome', 
                                '$tipo', 
                                '$categoria', 
                                '$bairro', 
                                '$qsuite', 
                                '$qquarto', 
                                '$areatotal', 
                                '$areaconstruida', 
                                '$qvaga', 
                                '$qreformas', 
                                '$qbanheiro', 
                                '$crad', 
                                '$cond', 
                                '$cad1', 
                                '$cad2', 
                                '$cad3', 
                                '$cad4', 
                                '$cad5', 
                                '$cad6', 
                                '$cad7', 
                                '$cad8', 
                                '$cad9', 
                                '$cad10', 
                                '$descricao', 
                                '$foto')";


//Teste de inserção

if(mysqli_query($conexao,$comando)) {
    // Se inserir
    $_SESSION['Erro'] = "Sucesso ao cadastrar";
    //manda para a mesma tela ou outra se der bom
    // Header("Location: ola.php");
} else {
    // Se der ruim 
    $_SESSION['Erro'] = "Erro ao cadastrar";
    // Header("Location: area_restrita_cadastro.php");
}
?>
