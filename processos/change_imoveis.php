<?php
session_start();
require("Autoload.php");
use Connection\Connection;

try {
    $con = new Connection('bdcrespo');

    /* Testando imagens */
    $updatePhotos = false;
    foreach ($_FILES as $key => $foto) {
        if (preg_match('/foto*/', $key)) {
            if (!empty($foto['tmp_name']) and empty($foto['error'])) {
                $updatePhotos = true;
            }
        }
    }

    /* Atualizar imagens */
    if ($updatePhotos == true) {
        $query = 'SELECT IMO_FOTOS FROM Imoveis WHERE IMO_COD = @codVAR';
        $vars = ['@codVAR' => $_POST['cod']];
        $old = $con->dbExec($query, $vars);

        $old = unserialize($old['IMO_FOTOS']);
        foreach ($_FILES as $key => $foto) {
            if (preg_match('/foto*/', $key)) {
                if (!empty($foto['tmp_name']) and empty($foto['error'])) {
                    /* Mover nova imagem e excluir antiga do servidor */
                    if (!empty($old[$key])) {
                        unlink('_uploads/' . $old[$key]);
                    }

                    $type = explode('/', $foto['type']);
                    $type = end($type);

                    if (!in_array($type, array('png', 'jpg', 'jpeg'))) {
                        // var_dump($file);
                        $_SESSION['Erro'] = 'Formato de imagem invalido ou imagem não enviada.';
                    }

                    /* Renomear arquivo e movê-lo */
                    $randName = explode('/', $foto['tmp_name']);
                    $randName = end($randName);

                    $old[$key] = $randName . time() . '.' . $type;
                    $up = '_uploads/' . $old[$key];

                    /* DEBUG */
                    // print_r($file);

                    move_uploaded_file($foto['tmp_name'], $up);
                    chmod($up, 775);


                    /* Atualizar no banco de dados */
                    $query = 'UPDATE Imoveis SET IMO_FOTOS = @fotosVAR WHERE IMO_COD = @codVAR';

                    $vars['@fotosVAR'] = serialize($old);
                    $con->dbExec($query, $vars);
                }
            }
        }
    }


    /* Atualizar outros dados */
    $query = 'UPDATE Imoveis SET IMO_NOME = @nomeVAR, IMO_TIPO = @tipoVAR, IMO_CATEGORIA = @categVAR, IMO_BAIRRO = @bairroVAR, IMO_SUITES = @suitesVAR, IMO_QUARTOS = @quartosVAR, IMO_AREA_TOTAL = @areaTotVAR, IMO_AREA_CONSTRUIDA = @areaConstVAR, IMO_BANHEIROS = @banVAR, IMO_VAGAS = @vagasVAR, IMO_ENDERECO_CONDOMINIO = @endCondVAR, IMO_CONDOMINIO = @condVAR, IMO_CARACTERISTICAS = @caracsVAR, IMO_PRECO = @precoVAR, IMO_A_VENDA = @vendaVAR, IMO_REFORMAS = @refsVAR, IMO_SITUACAO = @sitVAR, IMO_DESTAQUE = @destVAR, IMO_DESCRICAO = @descVAR WHERE IMO_COD = @codVAR';
    $vars = array(
        '@nomeVAR' => $_POST['nome'],
        '@tipoVAR' => $_POST['tipo'],
        '@categVAR' => $_POST['categoria'],
        '@bairroVAR' => $_POST['bairro'],
        '@suitesVAR' => $_POST['suites'],
        '@quartosVAR' => $_POST['quartos'],
        '@areaTotVAR' => $_POST['area_total'],
        '@areaConstVAR' => $_POST['area_construida'],
        '@banVAR' => $_POST['banheiros'],
        '@vagasVAR' => $_POST['vagas'],
        '@endCondVAR' => $_POST['endereco_condominio'],
        '@condVAR' => $_POST['condominio'],
        '@caracsVAR' => serialize($_POST['cad']),
        '@precoVAR' => $_POST['preco'],
        '@vendaVAR' => $_POST['a_venda'],
        '@refsVAR' => $_POST['reformas'],
        '@sitVAR' => $_POST['situacao'],
        '@destVAR' => $_POST['destaque'],
        '@descVAR' => utf8_encode($_POST['descricao']),
        '@codVAR' => $_POST['cod']
    );

    $con->dbExec($query, $vars);
} catch (Exception $e) {
    exit('Ocorreu um erro interno, contate o suporte.');
}

header('Location: ../area_restrita_cadastro.php');
