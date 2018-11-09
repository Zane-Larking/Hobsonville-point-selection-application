var IsSelected = function(element){
    return element.getAttribute("toggle") == "true";

}

var optionToIndex = function(option){
    
    switch (option){
        case "First":
            return 0;
        case "Second":
            return 1;
        case "Third":
            return 2;
    }
}

var Select = function(element){
    //debugging
    console.log("Selecting");
    console.log("orginial: ");
    console.log(element);

    let periodEl = element.parentElement.parentElement;

    //this course's subjects
    classesSubjects = element.getElementsByClassName("SubjectOfClass")
    for (var i = 0; i < classesSubjects.length; i ++){
        SelectedSubjects[element.getAttribute("option") + "Choices"].push(classesSubjects[i].innerHTML);
    }
    //debugging
    console.log("subjects:");
    console.log(SelectedSubjects[element.getAttribute("option") + "Choices"]);

    //deselect other courses
    //creates a list of sibling elements
    let parentEl = element.parentElement;
    let siblingEls = [];
    let tempChildEl = parentEl.firstElementChild;
    for (let i = 0; i < parentEl.childElementCount; i ++) {
        if (tempChildEl != element){
            siblingEls.push(tempChildEl);
        }
        tempChildEl = tempChildEl.nextElementSibling
    }
    //calls 'Deselect' on all the sibling elements
    for (var i = 0; i < siblingEls.length; i ++){
        if (IsSelected(siblingEls[i]) && siblingEls[i].getAttribute("option") == element.getAttribute("option")) {
            Deselect(siblingEls[i]);
        }
    }
    


    //selects this course
    element.setAttribute("toggle", true);
    element.getElementsByClassName("ClassSelectButton")[optionToIndex(element.getAttribute("option"))].innerHTML = "Unselect";

    //create visual clones:
    //creates a 'CurricumClone'
    //adds this course to 'FirstChoices' in the 'CurriculumBar'
    let CurriculumClone = document.querySelector("#CurriculumCoverage #" + element.getAttribute("option") + "Choices").getElementsByClassName(periodEl.id)[0];
    CurriculumClone.innerHTML = element.innerHTML;

    //sets attributes
    CurriculumClone.setAttribute("toggle", true);
    CurriculumClone.setAttribute("option", element.getAttribute("option"));

    //adds "class dropdown button" functionality
    let CurriculumClone_CDDBtn = CurriculumClone.getElementsByClassName("ClassDropdownButton")[0];
    CurriculumClone_CDDBtn.addEventListener("click", ClassDDBtnFunct);


    //creates a 'SelectedClassesClone'
    //adds this course to 'SelectedClasses' in the appropiate period (i.e 'Module1')
    let SelectedClassesClone = periodEl.querySelector("." + element.getAttribute("option") + "Choice > div");
    SelectedClassesClone.innerHTML = element.innerHTML;

    //sets attributes
    SelectedClassesClone.setAttribute("toggle", true);
    SelectedClassesClone.setAttribute("option", element.getAttribute("option"));
    
    //adds "class dropdown button" functionality
    let SelectedClassesClone_CDDBtn = SelectedClassesClone.getElementsByClassName("ClassDropdownButton")[0];
    SelectedClassesClone_CDDBtn.addEventListener("click", ClassDDBtnFunct);
}

var Deselect = function(element){
    //debugging
    console.log("Deselecting");
    console.log("orginial: ");
    console.log(element);

    let periodEl = element.parentElement.parentElement;

    //this course's subjects
    classesSubjects = element.getElementsByClassName("SubjectOfClass")
    //removes this course's subjects from the 'SelectedSubjects' array
    for (var i = 0; i < classesSubjects.length; i ++){
        console.log(element.getAttribute("option") );
        SelectedSubjects[element.getAttribute("option") + "Choices"].splice(SelectedSubjects[element.getAttribute("option") + "Choices"].indexOf(classesSubjects[i].innerHTML), 1);
    }
    //debugging
    console.log("subjects:");
    console.log(SelectedSubjects[element.getAttribute("option") + "Choices"]);

    //deselects this course
    element.setAttribute("toggle", false);
    element.getElementsByClassName("ClassSelectButton")[optionToIndex(element.getAttribute("option"))].innerHTML = element.getAttribute("option");

    //remove this course from 'SelectedClasses' in the appropiate period (i.e 'Module1')
    periodEl.querySelector("." + element.getAttribute("option") + "Choice > div").innerHTML = "";
    //remove this course from 'FirstChoices' in the 'CurriculumBar'
    document.getElementById(element.getAttribute("option") + "Choices").getElementsByClassName(periodEl.id)[0].innerHTML = "";

}



var ReturnOriginalElViaCurriculumClone = function(clone){
    console.log(clone.className)
    return document.querySelectorAll("#" + clone.className + " [toggle='true'][option='" + clone.getAttribute("option") + "']")[1];
}

var ReturnOriginalElViaSelectedClassesClone = function(clone){
    console.log(clone.parentElement.parentElement.parentElement.id)
    return document.querySelectorAll("#" + clone.parentElement.parentElement.parentElement.id + " [toggle='true'][option='" + clone.getAttribute("option") + "']")[1];
    
}
/*
var DeselectViaClone = function(){
    //update original elements 'toggle' attribute to reconise the course was deselected
    original.setAttribute("toggle", false);
    original.getElementsByClassName("ClassSelectButton")[0].innerHTML = "Select";
    
    //delete the clones:
    //deletes the 'CurriculumClone'
    document.getElementById("FirstChoices").getElementsByClassName(periodEl.id)[0].innerHTML = ""
    //deletes the 'SelectedClassesClone'
    periodEl.getElementsByClassName("FirstChoice")[0].innerHTML = ""
    
    //(by delete I mean set the innerHTML that displays the course to an empty string, i.e: "")
}
*/

var DeselectViaSelectedClassesClone = function(element){
    let clone = element;

    //identifies the original element (the only difference between this and the next function)
    original = ReturnOriginalElViaSelectedClassesClone(clone)
    Deselect(original);
    UpdateTally();
}

var DeselectViaCurriculumClone = function(element){
    let clone = element;

    //identifies the original element (the only difference between this and the previous function)
    original = ReturnOriginalElViaCurriculumClone(clone)
    Deselect(original);
    UpdateTally();
}

let classesSubjects
var ToggleCourseSelected = function(e){
    console.log(e);
    //this is the respective div with the 'course' class 
    if (e.target.className != "ClassSelectButton") {
        return
    }
    let course = e.target.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement;
    
    //sets a toggle attribute on course if it was not defined
    console.log(course.getAttribute("toggle"));
    if (course.getAttribute("toggle") == undefined) {
        course.setAttribute("toggle", false);
    }

    //sets a option attribute on course based on different conditions
    if (course.getAttribute("toggle") == "false"){
        course.setAttribute("option", e.target.innerText);
        console.log("attributes set");
    }
    else if (e.target.innerText == "Unselect") {
        console.log("this is the same priority level");
    }
    else {
        console.log("this is a different priority level");
        //if from a class
        if (course.parentElement.parentElement.parentElement.id == "mainGrid") {
            Deselect(course);
        }
        //if from a selected class
        if (course.parentElement.parentElement.className == "SelectedClasses") {
            DeselectViaSelectedClassesClone(course);
        }
        //if from the curriculum coverage
        if (course.parentElement.parentElement.parentElement.id == "CurriculumCoverage") {
            console.log("test");
            DeselectViaCurriculumClone(course);
        }
        course.setAttribute("option", e.target.innerText);
        course.setAttribute("toggle", false);
    }

    if (course.getAttribute("toggle") == "true"){
        //if from a class
        if (course.parentElement.parentElement.parentElement.id == "mainGrid") {
            Deselect(course);
        }
        //if from a selected class
        if (course.parentElement.parentElement.className == "SelectedClasses") {
            DeselectViaSelectedClassesClone(course);
        }
        //if from the curriculum coverage
        if (course.parentElement.parentElement.parentElement.id == "CurriculumCoverage") {
            console.log("test");
            DeselectViaCurriculumClone(course);
        }
    }
    else {
        Select(course);
    }
    UpdateTally();
}

var mainGridEl = document.getElementById("mainGrid");

// mainGridEl.parentElement.parentElement.parentElement.setAttribute("toggle", false);
mainGridEl.addEventListener("click", ToggleCourseSelected);


// var SelectMouseEnter = function(e) {
//     console.log("testing 123");
//     console.log(e);
//     e.target.parentElement.parentElement.style.gridTemplate = "25rem 25rem 80rem/20% 3fr 5fr";
// }

// var SelectMouseExit = function(e) {
//     console.log("testing 123");
//     console.log(e);
//     e.target.parentElement.parentElement.style.gridTemplate = "25rem 25rem max-content/20% 3fr 5fr";
// }

// var SelectDropdownBtn = document.getElementsByClassName("selectDropdown");
// console.log(SelectDropdownBtn);
// for (var i = 0; i < SelectDropdownBtn.length; i ++) {
//     SelectDropdownBtn[i].addEventListener("mouseenter", SelectMouseEnter);
//     SelectDropdownBtn[i].addEventListener("mouseleave", SelectMouseExit);
    
// }