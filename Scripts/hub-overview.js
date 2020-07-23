function approveSelection(e, id) {
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.response == false) {
                alert("Error approving class");
            }
            

            e.target.setAttribute("approval-status", "1");
        }
    };
    xhttp.open("POST", "AJAX/update-selection-approval-status.php", true);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // xhttp.send("year_level="+year_level);
    xhttp.send("status=1&id="+id);
}

function unapproveSelection(e, id) {
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.response == false) {
                alert("Error unapproving class");
            }
            

            e.target.setAttribute("approval-status", "0");
        }
    };
    xhttp.open("POST", "AJAX/update-selection-approval-status.php", true);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // xhttp.send("year_level="+year_level);
    xhttp.send("status=0&id="+id);
}

function approvalHandler(e) {
    let el = e.target;
    let status = el.getAttribute("approval-status")
    let id = el.getAttribute("selection-id")
    if (status == 0){
        approveSelection(e, id, status);
    }
    else if(status == 1) {
        unapproveSelection(e, id, status);
    }
}
for (btn of document.body.querySelectorAll(".approve-button")) {
    btn.addEventListener("click", approvalHandler); 
}