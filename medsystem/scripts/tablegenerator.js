function createTableElement(xhttp, parent) {

    var div = document.createElement('DIV');

    div.setAttribute("class", "content-window brd");
    div.setAttribute("id", "appTable");
    div.innerHTML = xhttp.responseText;

    parent.appendChild(div);
}

function createTable(parent, tableNum, val) {

    var xhttp = new XMLHttpRequest();
    var pathToForm = "forms/tables/table" + tableNum + ".php?val=" + val;

    xhttp.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200) {
            createTableElement(this, parent);
        }
    };
    
    xhttp.open("GET", pathToForm, true);
    xhttp.send();
}

function showTable(tableNum, s) {
    var table = document.getElementById("appTable");
    var parent = document.getElementById("formWindow");

    if(table)
        parent.removeChild(table);

    createTable(parent, tableNum, s.value);
}
