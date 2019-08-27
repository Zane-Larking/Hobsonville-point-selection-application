
function save() {
    /* functionality of a save button */
    let detailsEl = document.querySelector("#"+currentYearLevel+" .details");
    console.log(detailsEl);
    let fields = ['id', 'code', 'name', 'description', 'type', 'teacher1', 'teacher2', 'subject1', 'subject2'];
    let details = [];

    //update editing ability
    detailsEl.querySelectorAll("textarea").forEach(field => {
        field.setAttribute("readonly", "");
        details.push(field.value);
    });
    detailsEl.querySelectorAll("select").forEach(field => {
        field.setAttribute("disabled", "");
        details.push(field.value);
    });
    
    //toggles between edit and save
    document.querySelector("#"+currentYearLevel+" .details .buttons input[value='edit']").style.display = "block";
    document.querySelector("#"+currentYearLevel+" .details .buttons input[value='save']").style.display = "none";
    
    console.log(details);

    //if there are unsaved changes update the database.
    if (unsavedChanges) {
        data = "";
        //gathers field values into a http data string.
        for (let i = 0; i < fields.length; i++) {
            data += fields[i] + "=" + details[i];
            if (i != fields.length - 1) {
                data += "&";
            }
        }
        console.log(data);
        //runs an ajax request to
        postDoc("AJAX/update-class-details.php", data, updateDetails);
    }
}

function edit() {
    //enables editing on inputs
    let detailsEl = document.querySelector("#"+currentYearLevel+" .details");
    console.log(detailsEl);
    let fields = ['id', 'code', 'name', 'description', 'type', 'subject1', 'subject2', 'teacher1', 'teacher2'];
    detailsEl.querySelectorAll("textarea").forEach(field => {
        field.removeAttribute("readonly");
    });
    detailsEl.querySelectorAll("select").forEach(field => {
        field.removeAttribute("disabled");
    });
    //updating state
    editing = true;

    //repalce the save button with edit
    document.querySelector("#"+currentYearLevel+" .details .buttons input[value='edit']").style.display = "none";
    document.querySelector("#"+currentYearLevel+" .details .buttons input[value='save']").style.display = "block";       
}

//AJAX requests
function getDoc(url, func) {
    /* fires a AJAX get request with data passed in the url and runs the callback function with its results */
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            func(this);
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();
}

function postDoc(url, data, func) {
    /* fires a AJAX get request with data passed in 'data' and runs the callback function with its results */
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            func(this);
        }
    };
    xhttp.open("POST", url, true);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhttp.send(data);
}

//AJAX callback functions
function loadDetails(xhttp) {
    //in the format: [CODE, NAME, TYPE, SUBJECT1, SUBJECT2, TEACHER1, TEACHER2, DESCRIPTION]
    let cDetails = xhttp.response.split("<BREAK>");
    console.log(cDetails);

    //updates all the inputs field to display the details of te 
    let fields = ['id', 'code', 'name', 'type', 'subject1', 'subject2', 'teacher1', 'teacher2', 'description'];
    let x;
    for (let i = 0; i< fields.length; i++) {
        x = document.querySelector("#"+currentYearLevel+" ."+fields[i]);
        console.log("#"+currentYearLevel+" ."+fields[i]);  
        x.value = cDetails[i];
    }
    currentClass[currentYearLevel] = document.querySelector("#"+currentYearLevel+" .details textarea[name='code']").value;

}

function updateDetails(http) {
    console.log(http.response);
    if (http.response == "true") {
        alert("Changes saved");

        //update state
        unsavedChanges = false;

        //If the class's code was changed then this makes sure the scroll pannel updates so that the class can still be edited 
        let oldCode = currentClass[currentYearLevel];
        let newCode = document.querySelector("#"+currentYearLevel+" .details textarea[name='code']").value; 
        let temp = document.querySelector("#"+currentYearLevel + " " + "." + oldCode);

        //Updates the subject being displayed
        let subjects = temp.querySelectorAll(".subject");
        let domain;
        domain = document.querySelector("#"+currentYearLevel+" .details .subject1").value;
        subjects[0].className = "subject " + subjectFromDomain(domain);
        domain = document.querySelector("#"+currentYearLevel+" .details .subject2").value;
        subjects[1].className = "subject " + subjectFromDomain(domain);

        //Updates the Code being displayed.
        temp.outerHTML = temp.outerHTML.replace(new RegExp(oldCode, 'gi'), newCode);


    }else {
        alert("Error!")
    }

}
