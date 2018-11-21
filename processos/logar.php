<?php
session_start();
require 'conexao.php';

if (!empty($_POST) &&
    !empty($_POST['user']) && 
    !empty($_POST['senha'])
) {
    $usuario = mysqli_real_escape_string($conexao, $_POST['user']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);


    $sql = "SELECT * FROM Usuario WHERE  USU_LOGIN = '$usuario'";

    $result = mysqli_query($conexao, $sql);
    $resultado = mysqli_fetch_assoc($result);

    if(empty($resultado)) {
        $_SESSION['ErroLogin'] = 'Usuário não existente.';
        /*Se der ruim continua na tela login*/
        header ('Location: ../area_restrita_login.php');
    } else {
        if (crypt($senha, $resultado['USU_SENHA']) === $resultado['USU_SENHA']) {
            $_SESSION['user'] = $usuario;
            /*Se der bom, manda para a tela de administrador,que gerencia tudo*/
            header("Location: ../area_restrita_cadastro.php"); 
        } else {
            $_SESSION['ErroLogin'] = 'Senha incorreta.';
            /*Se der ruim continua na tela login*/
            header ('Location: ../area_restrita_login.php');
        }
    }
}   

