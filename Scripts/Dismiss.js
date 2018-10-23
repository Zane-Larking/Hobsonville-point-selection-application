var ToggleCourseDismissed = function(){

}


var btns = document.getElementsByClassName("ClassDismissButton");
for (var i = 0; i < btns.length; i ++) {
    btns[i].addEventListener("click", ToggleCourseDismissed);
}