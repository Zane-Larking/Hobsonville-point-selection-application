function collapseSection(element) {
    console.log("Collapsing");
    // get the height of the element's inner content, regardless of its actual size
    var sectionHeight = element.scrollHeight;
    console.log("section height: " + sectionHeight);
    // temporarily disable all css transitions
    var elementTransition = element.style.transition;
    element.style.transition = '';
    // on the next frame (as soon as the previous style change has taken effect),
    // explicitly set the element's height to its current pixel height, so we 
    // aren't transitioning out of 'auto'
    requestAnimationFrame(function() {
        element.style.height = sectionHeight + 'px';
        element.style.transition = elementTransition;
        
        // on the next frame (as soon as the previous style change has taken effect),
        // have the element transition to height: 0
        requestAnimationFrame(function() {
            element.style.height = 0 + 'px';
        });
    });
    
    // mark the section as "currently collapsed"
    element.setAttribute('data-collapsed', 'true');
}

function expandSection(element) {
    console.log("test expand");
    // get the height of the element's inner content, regardless of its actual size
    var sectionHeight = element.scrollHeight;
    console.log(sectionHeight);

    // have the element transition to the height of its inner content
    element.style.height = sectionHeight + 'px';

    // when the next css transition finishes (which should be the one we just triggered)
    element.addEventListener('transitionend', function(e) {
        // remove this event listener so it only gets triggered once
        element.removeEventListener('transitionend', arguments.callee);
        
        // remove "height" from the element's inline styles, so it can return to its initial value
        element.style.height = null;
    });

    // mark the section as "currently not collapsed"
    element.setAttribute('data-collapsed', 'false');
}
function isCollapsed(element) {
    return element.getAttribute('data-collapsed') === 'true';
}
function findAncestor(el, selector) {
    current = el.parentElement;
    if (current == selector) {
        return current;
    }
    else {
        findAncestor(current, selector);
    }
}

function CreateSelectorFromMouseEvent(e, end, siblingOfEnd) {
    console.log(e);
    //console.log(findAncestor(e.targert, ));
    //format information from the 'MouseEvent' object (stored as 'e') to use as a CSS selector 
    mappedE = e.path.reverse().slice(3,-1).map((x) => {
        let output = [x.localName];
        let idName = [];
        if (x.id != "") {
            idName = x.id.split(" ");
        }
        idName.forEach(e => {
            output.push("#" + e);
        });
        let className = [];
        if (x.className != "") {
            className = x.className.split(" ");
        }
        className.forEach(e => {
            output.push("." + e);
        });
        
        return output.join("");
    });
    
    /* ===== debugging ===== */
    console.log(mappedE);
    console.log(mappedE.slice(0, mappedE.indexOf(end)).concat([siblingOfEnd]).join(" "));

    //output
    return mappedE
    .slice(0, mappedE.indexOf(end))
    .concat([siblingOfEnd])
    .join(" ");
}
var PriorityDDBtnFunct = function (e) {
    /* ===== OLD CODE FIXED UP ===== */
    var temp = e.target;
    if (e.target.childElementCount = 0) {
        temp = e.target.firstChild;
    }
    /* ===== OLD CODE ===== */
    //console.log("Priority test");
    //console.log(e);
    //console.log(e.target.parentElement.parentElement.nextElementSibling.nextElementSibling.atributes);
    //let pannel = e.target.parentElement.parentElement.nextElementSibling;
    let pannel = document.querySelector(CreateSelectorFromMouseEvent(e, "div.TallyBar", "div.DropdownClasses"));
    console.log(pannel);
    console.log("data collapsed attribute: "+ pannel.getAttribute('data-collapsed'));
    if (pannel.getAttribute('data-collapsed') == null) {
        pannel.setAttribute('data-collapsed', 'false')
    }

    var Classes = pannel.children;
    console.log(Classes);
    for (let i = 0; i < Classes.length; i++) {
        console.log(Classes[i]);
    }
    

    //toggle state
    console.log("isCollapsed: " + isCollapsed(pannel));
    if (isCollapsed(pannel)){
        // for (let i = 0; i < Classes.length ; i ++) {
        //     expandSection(Classes[i]);
        // }
        expandSection(pannel)
        temp.style.transform = "scaleY(1)";
    } else {
        // for (let i = 0; i < Classes.length; i ++) {
        //     collapseSection(Classes[i]);
        // }
        collapseSection(pannel)
        temp.style.transform = "scaleY(-1)";
        
    }
    console.log(pannel.getAttribute('data-collapsed'));
}

var PeriodDDBtnFunct = function (e) {
    /* ===== debugging ===== */
    //console.log(mappedE);
    //console.log(mappedE.slice(0, mappedE.indexOf("div.ClassBar.HeaderBar")).concat(["div.ClassDropdownDescription"]).join(" "));

    /* ===== OLD CODE FIXED UP ===== */
    var temp = e.target;
    if (e.target.childElementCount = 0) {
        temp = e.target.firstChild;
    }
    // console.log("Period test");
    // console.log(e);
    // console.log(temp.parentElement.parentElement.nextElementSibling.nextElementSibling.atributes);
    // let pannel = temp.parentElement.parentElement.nextElementSibling.nextElementSibling;
    
    /* ===== OLD CODE ===== */
    // console.log("Period test");
    // console.log(e);
    // console.log(e.target.parentElement.parentElement.nextElementSibling.nextElementSibling.atributes);
    // let pannel = e.target.parentElement.parentElement.nextElementSibling.nextElementSibling;
    
    /* ===== Logically Flawed Code ===== */
    let pannel = document.querySelector(CreateSelectorFromMouseEvent(e, "div.PeriodBar.HeaderBar", "div.DropdownClasses"));
    
    console.log("data collapsed attribute: "+ pannel.getAttribute('data-collapsed'));
    if (pannel.getAttribute('data-collapsed') == null) {
        pannel.setAttribute('data-collapsed', 'false')
    }

    var Classes = pannel.children;
    console.log(Classes);
    for (let i = 0; i < Classes.length; i++) {
        console.log(Classes[i]);
    }
    

    //toggle state
    console.log("isCollapsed: " + isCollapsed(pannel));
    if (isCollapsed(pannel)){
        // for (let i = 0; i < Classes.length ; i ++) {
        //     expandSection(Classes[i]);
        // }
        expandSection(pannel)
        temp.style.transform = "scaleY(1)";
    } else {
        // for (let i = 0; i < Classes.length; i ++) {
        //     collapseSection(Classes[i]);
        // }
        collapseSection(pannel)
        temp.style.transform = "scaleY(-1)";
    }
    console.log(pannel.getAttribute('data-collapsed'));
}
var ClassDDBtnFunct = function (e) {
    /* ===== debugging ===== */
    //console.log(mappedE);
    //console.log(mappedE.slice(0, mappedE.indexOf("div.ClassBar.HeaderBar")).concat(["div.ClassDropdownDescription"]).join(" "));

    /* ===== OLD CODE FIXED UP ===== */
    var temp = e.target;
    if (e.target.childElementCount > 0) {
        temp = e.target.firstChild;
    }
    console.log("Class test");
    console.log(e);
    console.log(temp);
    console.log(temp.parentElement.parentElement.parentElement.nextElementSibling);
    console.log(temp.parentElement.parentElement.parentElement.nextElementSibling.atributes);
    let pannel = temp.parentElement.parentElement.parentElement.nextElementSibling;

    /* ===== OLD CODE ===== */
    //console.log("Class test");
    //console.log(e);
    //console.log(e.target.parentElement.parentElement.nextElementSibling.nextElementSibling.atributes);
    //let pannel = e.target.parentElement.parentElement.nextElementSibling;

    /* ===== Logically Flawed Code ===== */
    //let pannel = document.querySelector(CreateSelectorFromMouseEvent(e, "div.ClassBar.HeaderBar", "div.ClassDropdownDescription"));
    console.log("data collapsed attribute: "+ pannel.getAttribute('data-collapsed'));
    if (pannel.getAttribute('data-collapsed') == null) {
        pannel.setAttribute('data-collapsed', 'false')
    }
    
    //toggle state
    console.log("Was Collapsed: " + isCollapsed(pannel));
    if (isCollapsed(pannel)){
        expandSection(pannel)
        temp.style.transform = "scaleY(1)";
    } else {
        collapseSection(pannel)
        temp.style.transform = "scaleY(-1)";
    }
}

/* ===== Priority (curriculum tally chart) tabs ===== */
var btns = document.getElementsByClassName("PriorityDropdownButton");
for (var i = 0; i < btns.length; i ++) {
    btns[i].addEventListener("click", PriorityDDBtnFunct);

}

/* ===== Period tabs ===== */
var btns = document.getElementsByClassName("PeriodDropdownButton");
for (var i = 0; i < btns.length; i ++) {
    btns[i].addEventListener("click", PeriodDDBtnFunct);

}

/* ===== Class drop-down descriptions ===== */
var btns = document.getElementsByClassName("ClassDropdownButton");
for (var i = 0; i < btns.length; i ++) {
    btns[i].addEventListener("click", ClassDDBtnFunct);
    //console.log(i);
    //console.log(btns[i]);
    //console.log(btns[i].parentElement.parentElement.nextElementSibling);
    //btns[i].parentElement.parentElement.nextElementSibling.style.display ="none";

}