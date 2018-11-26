<?php
require 'Autoload.php';
use Connection\Connection;

try {
    $categoria = $_POST['cat'];

    $query = 'SELECT * FROM Imoveis WHERE IMO_DESTAQUE = TRUE';
    $vars = array();

    if ($categoria != 'Geral') {
        $query .= ' AND IMO_CATEGORIA = @categVAR';
        $vars['@categVAR'] = $categoria;
    }

    $con = new Connection('bdcrespo');
    $imoveis = $con->dbExec($query, $vars);

    if (!empty($imoveis)) {
        if (!isset($imoveis[0])) {
            $back = $imoveis;
            $imoveis = array();
            $imoveis[0] = $back;
            unset($back);
        }

        $i = 1;

        foreach ($imoveis as $key => $imovel) {
            $fotos = unserialize($imovel['IMO_FOTOS']);

            if ($_POST['pag'] == 'index') {
                if ($i % 3 == 0) {
                    echo '</div><div class="imoveis-row">';
                }

                echo '<a class="imovel" href="imovel.php?cod='.$imovel['IMO_COD'].'">';
                echo '<h1>'.$imovel['IMO_BAIRRO'].'</h1>';
                echo '<img src="img/thumb.php?src='.__DIR__.'/_uploads/'.$fotos['foto0'].'&size=300x200">';
                
                
                if($imovel['IMO_A_VENDA']) {
                    echo '<span class="valor">VENDA R$'.str_replace('.', ',', $imovel['IMO_PRECO']).'</span>';
                } else {
                    echo '<span class="valor">ALUGUEL R$'.str_replace('.', ',', $imovel['IMO_PRECO']).'</span>';
                }

                echo '<div class="detalhes">
                        <span>Dormitorios <br>'.$imovel['IMO_QUARTOS'].'</span>
                        <span>Banheiros <br>'.$imovel['IMO_BANHEIROS'].'</span>
                        <span>Área <br>'.$imovel['IMO_AREA_TOTAL'].'m<sup>2</sup></span>
                    </div>
                </div>';
            } elseif ($_POST['pag'] == 'lista') {
                echo '<a href="imovel.php?cod='.$imovel['IMO_COD'].'" class="item col-12 col-lg-4">
                    <div class="row align-items-center">
                        <img src="img/thumb.php?src='.__DIR__.'/_uploads/'.$fotos['foto0'].'&size=200x150" class="col-6">
                        <div class="col-6 truncate">
                            <strong title="Nome">'.$imovel['IMO_NOME'].'</strong>
                            <p>'.$imovel['IMO_BAIRRO'].'</p>';
                if($imovel['IMO_A_VENDA']) {
                    echo '<div class="row justify-content-center">
                        <p class="col-12 price">Venda R$'.$imovel['IMO_PRECO'].'</p>
                    </div>';
                }else {
                    echo '<div class="row justify-content-center">
                        <p class="col-12 price">Aluguel R$'.$imovel['IMO_PRECO'].'</p>
                    </div>';
                }
                
                echo '</div>
                    </div>
                    <hr class="no-margin">
                    <div class="row">
                        <div class="detalhes container-fluid">
                            <span>Dormitorios <br>'.$imovel['IMO_QUARTOS'].'</span>
                            <span>Banheiros <br>'.$imovel['IMO_BANHEIROS'].'</span>
                            <span>Área <br>'.$imovel['IMO_AREA_TOTAL'].'m<sup>2</sup></span>
                        </div>
                    </div>
                </a>
                <hr style="margin-bottom: 1em;"';
                echo $i % 3 == 0 ? 'class=col-12>' : '>';
            }
            $i++;
        }
    } else {
        if ($_POST['pag'] == 'index') {
            echo '<h4 style="width: 100%; text-align: center;">Não há destaques nesta categoria.</h4>';
        } else {
            echo '<h4 style="width: 100%; text-align: center;">Não há imóveis nesta categoria.</h4>';
        }
    }

    
} catch (Exception $e) {
    echo 'Desculpe, ocorreu um erro interno. Contate o suporte.';
}
