let today = new Date();
let setValue = "startDate";
let currentMonth = today.getMonth(); //Get the current Month
let currentYear = today.getFullYear(); //Get the current Year
let selectYear = document.getElementById("year"); 
let selectMonth = document.getElementById("month");
let calendar = document.getElementById("calendar-body");
let startDate = false;
let endDate = false;


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

function showCalendar(month, year) {

    let firstDay = (new Date(year, month)).getDay();
    let daysInMonth = 32 - new Date(year, month, 32).getDate();

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
                if (date === startDate.date && month === startDate.month && year === startDate.year) {
                    cell.classList.add("startDate");
                } // color start date
                let millis = new Date(toString(month) + " " + toString(date) + " " + toString(year));
                let startMillis = new Date(toString(startDate.month) + " " + toString(startDate.date) + " " + toString(startDate.year));
                let endMillis = new Date(toString(endDate.month) + " " + toString(endDate.date) + " " + toString(endDate.year));
                if (startMillis < millis && millis < endMillis) {
                    cell.classList.add("intermediateDate");
                } // color dates in between                
                if (date === endDate.date && month === endDate.month && year === endDate.year) {
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

function setDate(event){
    clickedDate = event.target;
    startDate= {date:Number(clickedDate.innerText), month:currentMonth, year:currentYear};

    if (clickedDate.innerText == ""){
        return
    }

    //resets old 'Value' date's class name
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

