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
var xmlHttp = GetXmlHttpObject();
