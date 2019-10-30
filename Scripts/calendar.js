let today = new Date();
let setValue = "startDate";
let currentMonth = today.getMonth(); //Get the current Month
let currentYear = today.getFullYear(); //Get the current Year
let selectYear = document.getElementById("year"); 
let selectMonth = document.getElementById("month");
let calendar = document.getElementById("calendar-body");
let dates = {startDate: false, endDate: false};


let months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

let monthAndYear = document.getElementById("monthAndYear");
showCalendar(currentMonth, currentYear);


function next() {
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);
}

function previous() {
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
}

function jump() {
    currentYear = parseInt(selectYear.value);
    currentMonth = parseInt(selectMonth.value);
    showCalendar(currentMonth, currentYear);
}

function toggleSetDate(){
    console.log(setValue)
    if (setValue === "startDate") {
        setValue = "endDate";
        document.getElementById("toggleSetDate").innerHTML="Start Date";
    }

    else if (setValue === "endDate") {
        setValue = "startDate";
        document.getElementById("toggleSetDate").innerHTML="End Date";
    }

    
    
    

}

function showCalendar(month, year) {

    let firstDay = (new Date(year, month)).getDay(); // Gets the first day of the first week of the Month
    let daysInMonth = 32 - new Date(year, month, 32).getDate(); //Sees how many days there are in the Month

    let tbl = document.getElementById("calendar-body"); // body of the calendar

    // clearing all previous cells
    tbl.innerHTML = "";

    // filing data about month and in the page via DOM.
    monthAndYear.innerHTML = months[month] + " " + year;
    selectYear.value = year;
    selectMonth.value = month;

    // creating all cells
    let date = 1;
    for (let i = 0; i < 6; i++) {
        // creates a table row
        let row = document.createElement("tr");

        //creating individual cells, filing them up with data.
        for (let j = 0; j < 7; j++) {
            if (i === 0 && j < firstDay) {
                let cell = document.createElement("td");
                let cellText = document.createTextNode("");
                cell.appendChild(cellText);
                row.appendChild(cell);
            }
            else if (date > daysInMonth) {
                break;
            }

            else {
                let cell = document.createElement("td");
                let cellText = document.createTextNode(date);
                if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                    cell.classList.add("currentDay");
                } // color today's date
                if (date === dates.startDate.date && month === dates.startDate.month && year === dates.startDate.year) {
                    cell.classList.add("startDate");
                } // color start date


                let millis = new Date(year, month, date);
                let startMillis = new Date(dates.startDate.year, dates.startDate.month, dates.startDate.date);
                let endMillis = new Date(dates.endDate.year, dates.endDate.month, dates.endDate.date);
                
                if (startMillis.getTime() < millis.getTime() && millis.getTime() < endMillis.getTime()) {
                    cell.classList.add("intermediateDate");
                } // color dates in between                
                if (date === dates.endDate.date && month === dates.endDate.month && year === dates.endDate.year) {
                    cell.classList.add("endDate");
                } // color end date
                
                cell.appendChild(cellText);
                row.appendChild(cell);
                date++;
            }


        }

        tbl.appendChild(row); // appending each row into calendar body.
    }

}

function getSetValue() {
    return setValue;
}

function setDate(event){
    let clickedDate = event.target;
    // let setValue = getSetValue();
    console.log(setValue);
    
    if (clickedDate.innerText == ""){
        return
    }
    dates[setValue] = {date:Number(clickedDate.innerText), month:currentMonth, year:currentYear};

    // resets old 'Value' date's class name
    let old = document.querySelector("#calendar ."+ setValue);
    if (old) {
        old.classList.remove(setValue);
    }
    
    clickedDate.classList.add(setValue);

    //recreate calendar (lazy method)
    showCalendar(currentMonth, currentYear);
}

setTimeout(() => {
    console.log(calendar);
    calendar.addEventListener("click", setDate)
}, 0);