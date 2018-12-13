var submitSelections = function(classType) {
    var codeEls = document.getElementById("CurriculumCoverage").getElementsByClassName("ClassCode");
    var codes = [];
    for (var i = 0; i < codeEls.length; i++) {
        codes.push(codeEls[i].innerText);
    }
    console.log(codes);
    selections = codes.join(", ");
    console.log(selections);

    var link = document.createElement("a");
    link.setAttribute("href", "DataBase/SubmitSelections.php?selections=" + encodeURI(selections) + "&classType=" + encodeURI(classType));
    link.click();
    //creates a link and clicks it
}