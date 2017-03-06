function createSelectorElement(xhttp, parent) {

    var div = document.createElement('DIV');

    div.setAttribute("class", "select-wrapper");
    div.innerHTML = xhttp.responseText;

    parent.appendChild(div);
}

function getSelector(selectorNum, selectedValue, parent, nextSelector) {

    var xhttp = new XMLHttpRequest();
    var pathToForm = "forms/selectors/selector" + selectorNum + ".php?val=" + selectedValue;

    xhttp.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200) {
            createSelectorElement(this, parent, nextSelector);
        }
    };
    
    xhttp.open("GET", pathToForm, true);
    xhttp.send();
}

function clearNextSelector(parent, selector) {
    parent.removeChild(selector);
}

function createSelector(s, selectorNum) {

    var formDiv = document.getElementsByClassName("form");
    var selectors = s.parentElement.children;
    var selectedValue = s.value;

    for(var i = 0; i < selectors.length; i++)
    {
        if(selectors[i].nodeName == "DIV" && selectors[i].className =="select-wrapper")
            clearNextSelector(s.parentElement, selectors[i]);
    }

    getSelector(selectorNum, selectedValue, s.parentElement);       
}
