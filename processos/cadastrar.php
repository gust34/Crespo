<?php
session_start();
require 'Autoload.php';
use Connection\Connection;
unset($_SESSION['Erro']);


/* DEBUG */
// echo '<pre>';
// print_r($_POST);
// print_r($_FILES);
// echo '</pre>';


/* Variavel com os nomes das imagens */
$imgName = null;
/* upload da(s) imagem(s) */
/* Validar tipo de imagem */
foreach ($_FILES as $key => $file) {
    if (preg_match('/foto*/', $key)) {
        $type = explode('/', $file['type']);
        $type = end($type);

        if (!in_array($type, array('png', 'jpg', 'jpeg'))) {
            // var_dump($file);
            $_SESSION['Erro'] = 'Formato de imagem invalido ou imagem não enviada.';
        }

        /* Renomear arquivo e movê-lo */
        $imgName[$key] = time() . '.' . $type;
        $up = '_uploads/' . $imgName[$key];

        /* DEBUG */
        // print_r($file);

        move_uploaded_file($file['tmp_name'], $up);
        chmod($up, 775);
    }
}

if(!empty($_SESSION['Erro'])) {
    header("Location: ../area_restrita_cadastro.php");
} else {
    // Inserir valores no banco de dados
    $query = 'INSERT INTO Imoveis (IMO_NOME, IMO_TIPO, IMO_CATEGORIA, IMO_BAIRRO, IMO_SUITES, IMO_QUARTOS, IMO_AREA_TOTAL, IMO_AREA_CONSTRUIDA, IMO_REFORMAS, IMO_VAGAS, IMO_BANHEIROS, IMO_CONDOMINIO, IMO_ENDERECO_CONDOMINIO, IMO_CARACTERISTICAS, IMO_DESCRICAO, IMO_PRECO, IMO_A_VENDA, IMO_DESTAQUE, IMO_FOTOS)';
    $query .= 'VALUES (@nomeVAR, @tipoVAR, @categVAR, @bairroVAR, @suitesVAR, @quartosVAR, @areaTotVAR, @areaConstVAR, @reformasVAR, @vagasVAR, @banVAR, @condominioVAR, @enderecoCondVAR, @caracsVAR, @descVAR, @precoVendaVAR, @avendaVAR, @destVAR, @imgVAR)';

    foreach ($_POST['cad'] as $key => $value) {
        $_POST['cad'][$key] = utf8_encode($value);
    }

    $vars = array(
        '@nomeVAR' => $_POST['nome'],
        '@tipoVAR' => $_POST['tipo'],
        '@categVAR' => $_POST['categoria'],
        '@bairroVAR' => $_POST['bairro'],
        '@suitesVAR' => $_POST['suites'],
        '@quartosVAR' => $_POST['quartos'],
        '@areaTotVAR' => $_POST['area_total'],
        '@areaConstVAR' => $_POST['area_construida'],
        '@reformasVAR' => $_POST['reformas'],
        '@vagasVAR' => $_POST['vagas'],
        '@banVAR' => $_POST['banheiros'],
        '@condominioVAR' => $_POST['condominio'],
        '@enderecoCondVAR' => $_POST['endereco_condominio'],
        '@caracsVAR' => serialize($_POST['cad']),
        '@descVAR' => utf8_encode($_POST['descricao']),
        '@precoVendaVAR' => str_replace(',', '.', $_POST['preco']),
        '@avendaVAR' => str_replace(',', '.', $_POST['a_venda']),
        '@destVAR' => $_POST['destaque'],
        '@imgVAR' => serialize($imgName)
    );

    try {
        $con = new Connection('bdcrespo');
        if (!$con->dbExec($query, $vars)) {
            $_SESSION['Erro'] = 'Ocorreu um erro interno, contate o suporte.';
            foreach ($imgName as $value) {
                unlink('_uploads/' . $value);
            }
        }
    } catch (Exception $e) {
        $_SESSION['Erro'] = 'Ocorreu um erro interno, contate o suporte.';
    }
}
header("Location: ../area_restrita_cadastro.php");
