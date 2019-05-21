<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Classes</title>
    <script defer src="https://use.fontawesome.com/releases/v5.8.2/js/all.js" integrity="sha384-DJ25uNYET2XCl5ZF++U8eNxPWqcKohUUBUpKGlNLMchM7q4Wjg2CUpjHLaL8yYPH" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="Styles/main.css">
    <link rel="stylesheet" type="text/css" media="screen" href="Styles/nav.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="Styles/ClassManagement.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="Styles/searchPannel.css" />
    <link rel="stylesheet" type="text/css" href="Styles/subjectsKey.css">
    <link rel="stylesheet" type="text/css" href="Styles/scrollPannel.css">
    
    

    <?php
        include "DataBase/Databaseconnect.php";
        include "PhpSnippets/classesConstants.php";
    ?>
</head>
<body>
    <?php
    include ('PhpSnippets/headerBar.php');	
    ?>

    <div id="main">
        <div id="modalImport" class="modal">
            <form class="modalContent" action="DataBase/importClassDetails.php" method="post" enctype="multipart/form-data">
                <span class="close">&times;</span>
                <p>Make sure that the file you import is a csv file with the following column headers:<br>
                CODE, NAME, QUAL, TYPE, SUBJECT1, SUBJECT2, TEACHER1, TEACHER2 and DESCRIPTION.<br>
                (You may also include an ID field if it's column values are unique integer values, but it is not necessary) </p>
                <h2>Upload CSV file:</h2>
                <input type="file" name="file" accept="application/vnd.ms-excel, Microsoft Excel Comma Separated Values File (.csv),.csv">
                <br>
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
        <div id="mainGrid">
            <div id="yearGroups" style="grid-area: years; display: flex;">
                <button class="YearGroupTabLinks selected" onclick="changeYearLevel(event, 'FF')">
                    FF
                </button>
                <button class="YearGroupTabLinks" onclick="changeYearLevel(event, 'Q1')">
                    Q1
                </button>
                <button class="YearGroupTabLinks" onclick="changeYearLevel(event, 'Q2')">
                    Q2
                </button>
                <button class="YearGroupTabLinks" onclick="changeYearLevel(event, 'Q3')">
                    Q3
                </button>
            </div>
            <div id="subjects" style="grid-area: sub;">
                <div class="TECH">Tech</div>
                <div class="LANGUAGE">Language</div>
                <div class="SOCSCIENCE">SS</div>
                <div class="ENGLISH">English</div>
                <div class="MATH">Maths</div>
                <div class="SCIENCE">Science</div>
                <div class="ART">Arts</div>
                <div class="HPE">HPE</div>
            </div>
            <div id="toolBar" style="grid-area: bar;">
                <button id="saveBtn" class="roundedContainer tooltip" disabled>
                    <div class="tooltipText">Save (Feature Not Yet Implemented)</div>
                    <i class="far fa-save"></i>
                </button>
                <button id="loadBtn" class="roundedContainer tooltip" disabled>
                    <div class="tooltipText">Load (Feature Not Yet Implemented)</div>
                    <i class="fas fa-file-download"></i>
                </button>
                <button id="exportBtn" class="roundedContainer tooltip">
                    <div class="tooltipText">Export Classes</div>
                    <a href="Downloads/downloadFromDB.php/?data=classes"><i class="fas fa-upload"></i></a>
                </button>
                <button id="importBtn" class="roundedContainer tooltip" onclick="importClasses()">
                    <div class="tooltipText">Import Classes</div>
                    <i class="fas fa-download"></i>
                </button>
            </div>
            <?php
                foreach ($yearGroups as $yearGroup) {
                    //$yearGroups will output a string while the database as organised numbers from 0 to 3.
                    echo '
            <div id="'.$yearGroup.'" class="yearGroupTab">
                <div class="searchPannel">
                    <div class="sectionHeader TSTHeader">
                        <p style="grid-area: title;"><strong>Classes</strong></p>
                        <div class="searchBar" style="grid-area: textArea;">
                            <div class="material-icons prefix">search</div>
                            <input value="" class="search" type="text" placeholder="Filter classes">
                            <!--<textarea name="searchArea" class="search" rows="1"></textarea>-->
                        </div>
                    </div>
                    <div class="scrollPannel">
                    ';
                    $query = "select CODE, TYPE, SUBJECT1, SUBJECT2 from classes where QUAL = \"".$qual[$yearGroup]."\" ORDER BY type;";
                    $result = mysqli_query($dbconnect, $query);
                    $temp = "";
                    while ($row = mysqli_fetch_array($result)){
                        if (!($temp == $row['TYPE'])) {
                            $temp = $row['TYPE'];
                            echo '
                        <div style="background-color: rgba(0,0,0,0.1); margin: 4px -5px ; padding: 5px;">
                            <p>'.$row['TYPE'].'</p>
                        </div> 
                        ';
                        }
                        echo '
                        <div class="class '.$row['CODE'].'" onclick="changeDisplayedClass(event, \''.$row['CODE'].'\')">
                        
                            <p>'.$row['CODE'].'</p>
                            <div class="subjects">
                        ';
                        foreach (explode(" ",strtoupper($row["SUBJECT1"])) as $subject ) {
                            if ($subject != "") {
                                echo '
                                <div class="subject '.$subject.'"></div>
                                ';
                            }
                        }
                        foreach (explode(" ",strtoupper($row["SUBJECT2"])) as $subject ) {
                            if ($subject != "") {
                                echo '
                                <div class="subject '.$subject.'"></div>
                                ';
                            }
                        }

                        echo'
                            </div>
                        </div>
                        ';
                    }
                    echo '
                    </div>
                </div>
                <div class="hidePannel" onclick="hideSearchPannel(event)" style="grid-area: hidePannel;">
                    <p><<</p>
                </div>
                <div class="details" style="grid-area: details;">
                    <textarea class="id" name="id" style="display:none;"></textarea>
                    <textarea class="code" name="code" placeholder="Kamar Code" onchange="onDetailChange()" style="grid-area: Code"; readonly></textarea>
                    <textarea class="name" name="name" placeholder="Class Name" onchange="onDetailChange()" style="grid-area: Name"; readonly></textarea>
                    <textarea class="type" name="type" placeholder="Class Type" onchange="onDetailChange()" style="grid-area: Type"; readonly></textarea>
                    <textarea class="subject1" name="subject1" placeholder="Subject 1" onchange="onDetailChange()" style="grid-area: Subject1"; readonly></textarea>
                    <textarea class="subject2" name="subject2" placeholder="Subject 2" onchange="onDetailChange()" style="grid-area: Subject2"; readonly></textarea>
                    <textarea class="teacher1" name="teacher1" placeholder="Teacher 1" onchange="onDetailChange()" style="grid-area: Teacher1"; readonly></textarea>
                    <textarea class="teacher2" name="teacher2" placeholder="Teacher 2" onchange="onDetailChange()" style="grid-area: Teacher2"; readonly></textarea>
                    <textarea class="description" name="description" placeholder="Description"  onchange="onDetailChange()" style="grid-area: Description"; readonly></textarea>
                    
                    <div class="buttons" style="grid-area: Buttons";>
                        <input type="button" name="save" value="save" onclick="save()" style="display: none;">
                        <input type="button" name="edit" value="edit" onclick="edit()">
                        <div class="tooltip">
                            <div class="tooltipText">Export This Class (Feature Not Yet Implemented)</div>
                            <input type="button" name="edit" value="import">
                        </div>
                        <div class="tooltip">
                            <div class="tooltipText">Import To Class (Feature Not Yet Implemented)</div>
                            <input type="button" name="edit" value="export">
                        </div>
                    </div>


                </div>
            </div>';
                }
            ?>
        </div>
    </div>
<script>
    document.getElementById("FF").style.display = "grid";
    var currentYearLevel = "FF";
    var currentClass = {FF: "", Q1: "", Q2: "", Q3: ""};
    var unsavedChanges = false;
    var editing = false;
    function changeYearLevel(e, yearLevel) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="yearGroupTab" and hide them
        tabcontent = document.getElementsByClassName("yearGroupTab");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("YearGroupTabLinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" selected", "");
        }

        // Show the current tab, and add an "active" class to the link that opened the tab
        document.getElementById(yearLevel).style.display = "grid";
        e.currentTarget.className += " selected";

        //sets the current year level accordingly
        currentYearLevel = yearLevel;
    }
    
    function hideSearchPannel(e) {

        //hides pannel
        var pannels = document.getElementsByClassName("searchPannel");

        for (x in pannels) {
            if (x != 'length' & x != 'item' & x != "namedItem") {
                if (pannels[x].style.display == "") {
                    pannels[x].style.display = "none";
                    e.target.firstElementChild.innerHTML = ">>";
                }
                else if (pannels[x].style.display == "grid") {
                    pannels[x].style.display = "none";
                    e.target.firstElementChild.innerHTML = ">>";
                }
                else if (pannels[x].style.display == "none") {
                    pannels[x].style.display = "grid";
                    e.target.firstElementChild.innerHTML = "<<";
                }
            }
        }
    }

    function onDetailChange() {
        unsavedChanges = true;
        console.log("details changed");
    }

    function save() {
        let detailsEl = document.querySelector("#"+currentYearLevel+" .details");
        console.log(detailsEl);
        let fields = ['id', 'code', 'name', 'type', 'subject1', 'subject2', 'teacher1', 'teacher2', 'description'];
        let details = [];
        fields.forEach(field => {
            detailsEl.querySelector("textarea[name='"+field+"']").setAttribute("readonly", "");
            details.push(detailsEl.querySelector("textarea[name='"+field+"']").value);
        });
        
        document.querySelector("#"+currentYearLevel+" .details .buttons input[value='edit']").style.display = "block";
        document.querySelector("#"+currentYearLevel+" .details .buttons input[value='save']").style.display = "none";
        
        console.log(details);

        if (unsavedChanges) {
            data = "";
            for (let i = 0; i < fields.length; i++) {
                data += fields[i] + "=" + details[i];
                if (i != fields.length - 1) {
                    data += "&";
                }
            }
            console.log(data);
            postDoc("AJAX/updateClassDetails.php", data, updateClassDetails);
        }
    }
    
    function edit() {
        let detailsEl = document.querySelector("#"+currentYearLevel+" .details");
        console.log(detailsEl);
        let fields = ['code', 'name', 'type', 'subject1', 'subject2', 'teacher1', 'teacher2', 'description'];
        fields.forEach(field => {
            detailsEl.querySelector("textarea[name='"+field+"']").removeAttribute("readonly");
        });
        editing = true;

        document.querySelector("#"+currentYearLevel+" .details .buttons input[value='edit']").style.display = "none";
        document.querySelector("#"+currentYearLevel+" .details .buttons input[value='save']").style.display = "block";

        
    }

    function getDoc(url, func) {
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

    function loadClassDetails(xhttp) {
        //saved as [CODE, NAME, TYPE, SUBJECT1, SUBJECT2, TEACHER1, TEACHER2, DESCRIPTION]
        let cDetails = xhttp.response.split("<BREAK>");
        console.log(cDetails);

        let fields = ['id', 'code', 'name', 'type', 'subject1', 'subject2', 'teacher1', 'teacher2', 'description'];
        let x;
        for (let i = 0; i< fields.length; i++) {
            x = document.querySelector("#"+currentYearLevel+" ."+fields[i]);
            console.log("#"+currentYearLevel+" ."+fields[i]);  
            x.value = cDetails[i];
            currentClass[currentYearLevel] = document.querySelector("#"+currentYearLevel+" .details textarea[name='code']").value;
        }

    }

    function updateClassDetails(http) {
        console.log(http.response);
        if (http.response == "true") {
            alert("Changes saved");

            //
            unsavedChanges = false;

            //If the class's code was changed then this makes sure the scroll pannel updates so that the class can still be edited 
            let oldCode = currentClass[currentYearLevel];
            let newCode = document.querySelector("#"+currentYearLevel+" .details textarea[name='code']").value; 
            let temp = document.querySelector("#"+currentYearLevel + " " + "." + oldCode);

            //Updates the subject being displayed
            let subjects = temp.querySelectorAll(".subject");
            subjects[0].className = "subject " + document.querySelector("#"+currentYearLevel+" .details textarea[name='subject1']").value;
            subjects[1].className = "subject " + document.querySelector("#"+currentYearLevel+" .details textarea[name='subject2']").value;

            //Updates the Code being displayed.
            temp.outerHTML = temp.outerHTML.replace(new RegExp(oldCode, 'gi'), newCode);


        }else {
            alert("Error!")
        }

    }


    function changeDisplayedClass(e, search) {
        if (!editing || !unsavedChanges || confirm("Unsaved changes will be lost if you switch to another class. Are you sure you want to disgard changes and change class?")) {
            
            
            console.log(e);
            if (editing) {
                editing = false;

                let detailsEl = document.querySelector("#"+currentYearLevel+" .details");
                let fields = ['code', 'name', 'type', 'subject1', 'subject2', 'teacher1', 'teacher2', 'description'];
                fields.forEach(field => {
                    detailsEl.querySelector("textarea[name='"+field+"']").setAttribute("readonly", "");
                });

                document.querySelector("#"+currentYearLevel+" .details .buttons input[value='edit']").style.display = "block";
                document.querySelector("#"+currentYearLevel+" .details .buttons input[value='save']").style.display = "none";
            }
            if (unsavedChanges) {
                unsavedChanges = false;
            }
            getDoc("AJAX/accessClassDetails.php/?q="+search, loadClassDetails);


            // Get all elements with class="class" and remove the class "active"
            let classEls = document.querySelectorAll("#"+currentYearLevel+" .class");
            for (i = 0; i < classEls.length; i++) {
                classEls[i].className = classEls[i].className.replace(" selected", "");
            }

        // Add an "active" class to the link that opened the class details
        e.currentTarget.className += " selected";
        }
    }


    function importClasses() {
        if (confirm("WARNING! The classes you import will over-write all classes, as shown on this page, on the database. Are you sure you want to import a file? (it is recomended that you export the current information just in case)")) {
            modal.style.display = "block";
        }
    }

    //Modal
    // Get the modal
    var modal = document.getElementById("modalImport");

    // Get the <span> element that closes the modal
    var closeBtn = document.querySelector("#modalImport .close");

    // When the user clicks on <span> (x), close the modal
    closeBtn.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>