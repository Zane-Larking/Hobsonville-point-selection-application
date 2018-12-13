var submitSelections = function(classType) {
    var codeEls = document.getElementById("CurriculumCoverage").getElementsByClassName("ClassCode");
    var codes = [];
    for (var i = 0; i < codeEls.length; i++) {
        codes.push(codeEls[i].innerText);
    }
    console.log(codes);
    selections = codes.join(", ");
    console.log(selections);

    //creates a form and submits it
    var form = document.createElement("form");
    form.setAttribute("method", "get");
    form.setAttribute("action", "DataBase/SubmitSelections.php")

    //create a hidden input field
    var makeInputField = function(name, value) {
        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", name);
        hiddenField.setAttribute("value", value);
        form.appendChild(hiddenField);
    }
    makeInputField("selections", selections);
    makeInputField("classType", classType);


    document.body.appendChild(form);
    form.submit();
}