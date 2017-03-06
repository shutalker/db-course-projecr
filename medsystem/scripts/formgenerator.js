function clearForm(parElem) {

    var form = document.getElementsByClassName("form");
    
    if(form[0] != null)
        parElem.removeChild(form[0]);
}

function isFormExistingOnPage(formNum) {

    var form = document.getElementById("form" + formNum);
    
    if(form == null)
        return false;

    return true;
}

function createFormElement(xhttp, formNum, parElem) {

    var div = document.createElement('div');

    div.className = "content-window form";
    div.id = "form" + formNum;
    div.innerHTML = xhttp.responseText;

    parElem.appendChild(div);

}

function getForm(formNum, parElem) {

    var xhttp = new XMLHttpRequest();
    var pathToForm = "forms/form" + formNum + ".php?" + Math.random();

    xhttp.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200) {
            createFormElement(this, formNum, parElem);
        }
    };
    
    xhttp.open("GET", pathToForm, true);
    xhttp.send();
    
}


function createForm() {

    var parent = document.getElementById('formWindow');

    if(!isFormExistingOnPage(this.id) && parent != null) {
        clearForm(parent);
        getForm(this.id, parent);
    }
}

window.onload = function() {

    var buttons = document.getElementsByClassName("opt-btn");

    for(i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener("click", createForm);
    }
    
};
