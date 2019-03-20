let itemContainers = document.getElementsByClassName("drag-item-container");
let items = document.getElementsByClassName("drag-item");

let mouseOffset = {x: 0, y: 0};

let isMouseDown = false;
let currentItem = null;

function LightenDarkenColor(col, amt) {
  
    var usePound = false;
  
    if (col[0] == "#") {
        col = col.slice(1);
        usePound = true;
    }
 
    var num = parseInt(col,16);
 
    var r = (num >> 16) + amt;
 
    if (r > 255) r = 255;
    else if  (r < 0) r = 0;
 
    var b = ((num >> 8) & 0x00FF) + amt;
 
    if (b > 255) b = 255;
    else if  (b < 0) b = 0;
 
    var g = (num & 0x0000FF) + amt;
 
    if (g > 255) g = 255;
    else if (g < 0) g = 0;
 
    return (usePound?"#":"") + (g | (b << 8) | (r << 16)).toString(16);
  
}

function findAncestor (el, cls) {
    while ((el = el.parentElement) && !el.classList.contains(cls));
    return el;
}

doELsCollide = function(el1, el2) {
    el1.offsetBottom = el1.offsetTop + el1.offsetHeight;
    el1.offsetRight = el1.offsetLeft + el1.offsetWidth;
    el2.offsetBottom = el2.offsetTop + el2.offsetHeight;
    el2.offsetRight = el2.offsetLeft + el2.offsetWidth;

    return !(
        (el1.offsetBottom < el2.offsetTop) ||
        (el1.offsetTop > el2.offsetBottom) ||
        (el1.offsetRight < el2.offsetLeft) ||
        (el1.offsetLeft > el2.offsetRight)
    );

}

//create drag locations
for (let j = 0; j < itemContainers.length; j++) {
    let container = itemContainers[j];
    for (let i = 0; i < 6; i++) {
        let dragLocation = document.createElement("div");
        dragLocation.className = "drag-location";
        container.appendChild(dragLocation);
        
    }    
}

function dropDraggable(item, container) {
    container.appendChild(item);
}

setInterval(() => {
    if (currentItem != null) {
        let dragLocations = document.getElementsByClassName("drag-location");
        for (let i = 0; i < dragLocations.length; i++) {
            let dragLocation = dragLocations[i];
            dragLocation.className = dragLocation.className.replace(" drag-location-over", "")
            if (doELsCollide(currentItem, dragLocation)) {
                dragLocation.className += " drag-location-over";
                if (!isMouseDown) {
                    dropDraggable(currentItem, dragLocation);
                    currentItem = null;
                }
            }
            
        }
    }
}, 100)

function getContentWidth (element) {
    var styles = getComputedStyle(element)
  
    return element.getBoundingClientRect().width
      - parseFloat(styles.paddingLeft)
      - parseFloat(styles.paddingRight)+"px"
  }

function onMouseMove(e, item) {
    console.log("test");
    e.preventDefault();
    if (isMouseDown) {
        item.style.left = e.clientX + mouseOffset.x +"px";
        item.style.top = e.clientY + mouseOffset.y + "px"; 
    }
}

function onMouseDown(e, item) {
    isMouseDown = true;
    currentItem = item;
    mouseOffset = {x: item.offsetLeft - e.clientX, y: item.offsetTop - e.clientY}

    item.style.backgroundColor = LightenDarkenColor(item.style.backgroundColor, -64);
    item.style.width = getContentWidth(item);
    item.style.position = "absolute";
    

    //Add a an event listener to the bounding container when the user clicks an element.
    //All movement while saving processing power and solves a glitch.
    ancester = findAncestor(item, "classes");
    ancester.addEventListener("mousemove", (e) => {
        onMouseMove(e, item);
    });
    console.log(ancester);
}

function onMouseUp(e, item) {
    item.style.left = "";
    item.style.top = "";
    //item.style.position = "relative";
    mouseOffset = {x: 0, y:0};

    isMouseDown = false;
    item.style.backgroundColor = "#FFFFFF";
    item.style.width = "";

    
    //Add a an event listener to the bounding container when the user clicks an element.
    //All movement while saving processing power and solves a glitch.
    ancester = findAncestor(item, "classes");
    ancester.removeEventListener("mousemove", onMouseMove);
}

for (let i = 0; i < items.length; i++) {
    let item  = items[i];
    
    item.addEventListener("mousedown", (e) => {
        onMouseDown(e, item);
    });

    item.addEventListener("mouseup", (e) => {
        onMouseUp(e, item);
    });

    
}