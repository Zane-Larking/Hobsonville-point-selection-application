var UpdateTally = function(){
    //updates the tally charts in the Curriculum Coverage section
    choices = ["FirstChoices", "SecondChoices", "ThirdChoices"];
    // tallyBarEls = [];
    //repeat for every set of choices (i.e: "FirstChoices", "SecondChoices" and "ThirdChoices")
    choices.forEach(NthChoices => {
        /* ===== OLD CODE ===== */
        // tallyBarEls.push(document.getElementById(NthChoices).getElementsByClassName("TallySubject"));
        // document.getElementById(NthChoices).getElementsByClassName("TallySubject");
        //logs the tally chart elements
        // console.log(document.getElementById(NthChoices).getElementsByClassName("TallySubjects")[0]);
        //logs the currently selected subjects for the current set of choices
        // console.log(SelectedSubjects[NthChoices]);
        subjects = ["MATH", "ENGLISH", "SCIENCE", "SOCSCIENCE", "TECH", "HPE", "ART", "LANGUAGE"];
        
        //clear tally chart
        //columns is an array that stores all the div (tally for each subject) in the tally chart
        let columns = document.querySelectorAll("#" + NthChoices + " .TallySubjects div");
        // console.log(columns);
        //set each div's innerHTML to 0
        for (let j = 0; j < columns.length; j ++){
            columns[j].innerHTML = "0";
        }

        //repopulate tally chart
        //repeat for every selected subject 
        for (let i = 0; i < SelectedSubjects[NthChoices].length; i++) {
            //for every possible subject...
            let tempEl
            for (let j = 1; j <= subjects.length; j ++){
                //...check if the current selected is equal to it...
                if (SelectedSubjects[NthChoices][i] == subjects[j-1]) {
                    //...if so increment the applicable subject
                    tempEl = document.querySelector("#" + NthChoices+" .TallySubjects div:nth-child(" + j +")");
                    tempEl.innerHTML = parseInt(tempEl.innerHTML) + 1;
                }
            }
        }
    });
    // console.log(tallyBarEls);
    

}