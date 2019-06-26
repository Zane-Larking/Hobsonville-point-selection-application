var submitSelections = function(classType) {
    var classEls = document.querySelectorAll("#CurriculumCoverage .DropdownClasses > div");

    // for (let i = 0; i < classEls.length; i ++) {
    //     console.log(classEls[i].attributes.option);
    // }

    var selections = "";
    for (let i = 0; i < classEls.length; i ++) {
        classContent = '';
        if (classEls[i].querySelector(".ClassCode")) {
            classContent += classEls[i].querySelector(".ClassCode").innerText;
        }

        subjects = classEls[i].querySelectorAll(".SubjectOfClass");
        for (let j = 0; j < subjects.length; j++) {
            classContent += "-"+subjects[j].innerText;
            
        }

        console.log(classContent);
        selections += classContent;
        if (i+1 != classEls.length) {
            selections += ", ";
        }
    }


/*
    var codeEls = document.getElementById("CurriculumCoverage").getElementsByClassName("ClassCode");
    var subjects = document.getElementById("CurriculumCoverage").getElementsByClassName("SubjectOfClass");
    var codes = [];
    for (var i = 0; i < codeEls.length; i++) {
        codes.push(codeEls[i].innerText);
    }
    console.log(codes);
    selections = codes.join(",");
   */

    console.log(selections);


    //creates a form and submits it
    var form = document.createElement("form");
    form.setAttribute("method", "POST");
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

    let message = document.querySelector('#Application textArea').value;
    if (message != "") {
        makeInputField("date", datetime());
        makeInputField("message", message);
    }


    document.body.appendChild(form);
    form.submit();
}