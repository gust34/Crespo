function GetXmlHttpObject() {
    var xmlHttp = null;

    try {
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }

    return xmlHttp;
}

function stateChanged() {
    if (xmlHttp.readyState == 1 || xmlHttp.readyState == 2 || xmlHttp.readyState == 3) {
        document.getElementById('loading').style.display = 'block';
    }
    if (xmlHttp.readyState == 4) {
        if (xmlHttp.responseText != 'OK') {
            alert(xmlHttp.responseText);
        }
        document.getElementById('loading').style.display = 'none';
    }
}

/*************************************************************************/

function formChange() {
    if (xmlHttp.readyState == 1 || xmlHttp.readyState == 2 || xmlHttp.readyState == 3) {
        document.getElementById('loading').style.display = 'block';
    }
    if (xmlHttp.readyState == 4) {
        // alert(xmlHttp.responseText);
        var content = JSON.parse(xmlHttp.responseText);

        document.getElementById('targetCod').value = content.IMO_COD;
        document.getElementById('altNome').value = content.IMO_NOME;
        document.getElementById('altTipo').value = content.IMO_TIPO;
        document.getElementById('altCategoria').value = content.IMO_CATEGORIA;
        document.getElementById('altBairro').value = content.IMO_BAIRRO;
        document.getElementById('altSuites').value = content.IMO_SUITES;
        document.getElementById('altQuartos').value = content.IMO_QUARTOS;
        document.getElementById('altAreaTot').value = content.IMO_AREA_TOTAL;
        document.getElementById('altAreaConst').value = content.IMO_AREA_CONSTRUIDA;
        document.getElementById('altBanheiros').value = content.IMO_BANHEIROS;
        document.getElementById('altVagas').value = content.IMO_VAGAS;

        if (content.IMO_CONDOMINIO == true) {
            document.getElementById('altCondominioS').checked = true;
            document.getElementById('altEnd').value = content.IMO_ENDERECO_CONDOMINIO;
        } else {
            document.getElementById('altCondominioN').checked = true;
        }
        
        
        document.getElementById('altCad1').value = content.IMO_CARACTERISTICAS['1'];
        document.getElementById('altCad2').value = content.IMO_CARACTERISTICAS['2'];
        document.getElementById('altCad3').value = content.IMO_CARACTERISTICAS['3'];
        document.getElementById('altCad4').value = content.IMO_CARACTERISTICAS['4'];
        document.getElementById('altCad5').value = content.IMO_CARACTERISTICAS['5'];
        document.getElementById('altCad6').value = content.IMO_CARACTERISTICAS['6'];
        document.getElementById('altCad7').value = content.IMO_CARACTERISTICAS['7'];
        document.getElementById('altCad8').value = content.IMO_CARACTERISTICAS['8'];
        document.getElementById('altCad9').value = content.IMO_CARACTERISTICAS['9'];
        document.getElementById('altCad10').value = content.IMO_CARACTERISTICAS['10'];


        document.getElementById('altPreco').value = content.IMO_PRECO;

        if (content.IMO_A_VENDA == true) {
            document.getElementById('a_venda').checked = true;
        } else {
            document.getElementById('a_alugar').checked = true;
        }
        document.getElementById('altReformas').value = content.IMO_REFORMAS;
        document.getElementById('altSituacao').value = content.IMO_SITUACAO;
        

        if (content.IMO_DESTAQUE == true) {
            document.getElementById('altDestS').checked = true;
        } else {
            document.getElementById('altDestN').checked = true;
        }

        document.getElementById('altDescricao').value = content.IMO_DESCRICAO;

        document.getElementById('oldFoto0').src = 'processos/_uploads/'+content.IMO_FOTOS['foto0'];
        document.getElementById('oldFoto1').src = 'processos/_uploads/'+content.IMO_FOTOS['foto1'];
        document.getElementById('oldFoto2').src = 'processos/_uploads/'+content.IMO_FOTOS['foto2'];
        document.getElementById('oldFoto3').src = 'processos/_uploads/'+content.IMO_FOTOS['foto3'];
        document.getElementById('oldFoto4').src = 'processos/_uploads/'+content.IMO_FOTOS['foto4'];
        document.getElementById('oldFoto5').src = 'processos/_uploads/'+content.IMO_FOTOS['foto5'];
        document.getElementById('oldFoto6').src = 'processos/_uploads/'+content.IMO_FOTOS['foto6'];
        document.getElementById('oldFoto7').src = 'processos/_uploads/'+content.IMO_FOTOS['foto7'];
        document.getElementById('oldFoto8').src = 'processos/_uploads/'+content.IMO_FOTOS['foto8'];
        document.getElementById('oldFoto9').src = 'processos/_uploads/'+content.IMO_FOTOS['foto9'];

        document.getElementById('loading').style.display = 'none';
    }
}


function setDestaque(cod, value) {
    if (xmlHttp == null) {
        alert("Desculpe, foram identificados problemas de execução relacionados ao seu navegador. Tente acessar com outro.");
        return;
    } else {
        var url = 'processos/set_destaque.php';
        xmlHttp.onreadystatechange = stateChanged;
        xmlHttp.open('POST', url, true);
        xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xmlHttp.send('cod='+cod+'&value='+value);
    }
}

function getImovelToChange(cod) {
    if (xmlHttp == null) {
        alert("Desculpe, foram identificados problemas de execução relacionados ao seu navegador. Tente acessar com outro.");
        return;
    } else {
        var url = 'processos/get_imovel_to_change.php';
        xmlHttp.onreadystatechange = formChange;
        xmlHttp.open('POST', url, true);
        xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xmlHttp.send('cod='+cod);
    }
}



function updateCategoria() {
    if (xmlHttp.readyState == 4) {
        document.getElementById('imoveisSelecionados').innerHTML = xmlHttp.responseText;
    }
}
function selectCategoria(categoria, pag) {
    if (xmlHttp == null) {
        alert("Desculpe, foram identificados problemas de execução relacionados ao seu navegador. Tente acessar com outro.");
        return;
    } else {
        document.getElementById('txtCategoria').value = categoria;

        var url = 'processos/select_categoria.php';
        xmlHttp.onreadystatechange = updateCategoria;
        xmlHttp.open('POST', url, true);
        xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xmlHttp.send('cat='+categoria+'&pag='+pag);
    }
}
var xmlHttp = GetXmlHttpObject();
