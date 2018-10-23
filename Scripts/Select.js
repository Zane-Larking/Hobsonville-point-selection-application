var IsSelected = function(element){
    return element.getAttribute("toggle") == "true";

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
        SelectedSubjects["FirstChoices"].push(classesSubjects[i].innerHTML);
    }
    //debugging
    console.log("subjects:");
    console.log(SelectedSubjects["FirstChoices"]);

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
        if (IsSelected(siblingEls[i])) {
            Deselect(siblingEls[i]);
        }
    }
    
    //selects this course
    element.setAttribute("toggle", true);
    element.getElementsByClassName("ClassSelectButton")[0].innerHTML = "Unselect";

    //create visual clones:
    //creates a 'CurricumClone'
    //adds this course to 'FirstChoices' in the 'CurriculumBar'
    let CurriculumClone = document.querySelector("#CurriculumCoverage #FirstChoices").getElementsByClassName(periodEl.id)[0];
    CurriculumClone.innerHTML = element.innerHTML;

    //adds event listeners to the newly created clone element
    //adds "class dropdown button" functionality
    let CurriculumClone_CDDBtn = CurriculumClone.getElementsByClassName("ClassDropdownButton")[0];
    CurriculumClone_CDDBtn.addEventListener("click", ClassDDBtnFunct);
    //adds "DeselectViaSelectedClassesClone" functionality
    let CurriculumSelectBtn = CurriculumClone.getElementsByClassName("ClassSelectButton")[0];
    CurriculumSelectBtn.addEventListener("click", DeselectViaCurriculumClone);


    //creates a 'SelectedClassesClone'
    //adds this course to 'SelectedClasses' in the appropiate period (i.e 'Module1')
    let SelectedClassesClone = periodEl.querySelector(".FirstChoice > div");
    SelectedClassesClone.innerHTML = element.innerHTML;
    
    //adds event listeners to the newly created clone element
    //adds "class dropdown button" functionality
    let SelectedClassesClone_CDDBtn = SelectedClassesClone.getElementsByClassName("ClassDropdownButton")[0];
    SelectedClassesClone_CDDBtn.addEventListener("click", ClassDDBtnFunct);
    //adds "DeselectViaSelectedClassesClone" functionality
    let SelectedClassesClone_SelectBtn = SelectedClassesClone.getElementsByClassName("ClassSelectButton")[0];
    SelectedClassesClone_SelectBtn.addEventListener("click", DeselectViaSelectedClassesClone);   
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
        SelectedSubjects["FirstChoices"].splice(SelectedSubjects["FirstChoices"].indexOf(classesSubjects[i].innerHTML), 1);
    }
    //debugging
    console.log("subjects:");
    console.log(SelectedSubjects["FirstChoices"]);

    //deselects this course
    element.setAttribute("toggle", false);
    element.getElementsByClassName("ClassSelectButton")[0].innerHTML = "Select";

    //remove this course from 'SelectedClasses' in the appropiate period (i.e 'Module1')
    periodEl.querySelector(".FirstChoice > div").innerHTML = "";
    //remove this course from 'FirstChoices' in the 'CurriculumBar'
    document.getElementById("FirstChoices").getElementsByClassName(periodEl.id)[0].innerHTML = "";

}



var ReturnOriginalElViaCurriculumClone = function(clone){
    return document.querySelector("#" + clone.className + " [toggle='true']");
}

var ReturnOriginalElViaSelectedClassesClone = function(clone){
    return document.querySelector("#" + clone.parentElement.parentElement.parentElement.id + " [toggle='true']");
    
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

var DeselectViaSelectedClassesClone = function(e){
    let clone = e.target.parentElement.parentElement.parentElement;

    //identifies the original element (the only difference between this and the next function)
    original = ReturnOriginalElViaSelectedClassesClone(clone)
    Deselect(original);
    UpdateTally();
}

var DeselectViaCurriculumClone = function(e){
    let clone = e.target.parentElement.parentElement.parentElement;

    //identifies the original element (the only difference between this and the previous function)
    original = ReturnOriginalElViaCurriculumClone(clone)
    Deselect(original);
    UpdateTally();
}

let classesSubjects
var ToggleCourseSelected = function(e){
    //this is the respective div with the 'course' class 
    let course = e.target.parentElement.parentElement.parentElement;
    if (course.getAttribute("toggle") == "true"){
        Deselect(course);
    }
    else {
        Select(course);
    }
    UpdateTally();
}

var SelectBtns = document.getElementsByClassName("ClassSelectButton");
//console.log("pre-test");
for (var i = 0; i < SelectBtns.length; i ++) {
    SelectBtns[i].parentElement.parentElement.parentElement.setAttribute("toggle", false);
    SelectBtns[i].addEventListener("click", ToggleCourseSelected);
}

