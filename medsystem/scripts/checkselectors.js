function checkselector(f) {
    var selectors = f.getElementsByTagName("select");
    
    if(selectors.length > 0)
        for(var i = 0; i < selectors.length; i++)
            if(selectors[i].value == "disabled")
            {
                alert("Вы не заполнили одно или несколько полей выбора в форме!");
                return false;
            }
    f.submit();
    return true;
}
