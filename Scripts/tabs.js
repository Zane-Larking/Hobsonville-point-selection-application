function toggleTab() {
    //Debugging
    // console.log(event);
    let srcBtn = event.target;
    let btnPanel = event.currentTarget;
    
    function targetIsToggleBtn(el) {
        if (el.tagName == "BUTTON" && el.classList.contains("toggle-btn")) {
            srcBtn = el;
            return true;
        }
        else if (el == btnPanel) {
            return false;
        }
        else {
            return targetIsToggleBtn(el.parentElement);
        }
    }

    //only runs the function if a button was pressed
    console.log(srcBtn);
    console.log(srcBtn.classList);
    // let targetIsToggleBtn = srcBtn.tagName == "BUTTON" && srcBtn.classList.contains("toggle-btn");
    console.log(targetIsToggleBtn(srcBtn));
    console.log(srcBtn);
    if (!targetIsToggleBtn(srcBtn)) {
        return;
    }
    
    //figures out what 'toggle-tab' element the button was in.
    //sets ultParent to that element.
    let parent = btnPanel.parentElement;
    while (!parent.classList.contains("toggle-tabs")) {
        parent = parent.parentElement;
    }
    ultParent = parent;
    
    //figures out what button was pressed
    let out;
    let toggleBtns = btnPanel.querySelectorAll(".toggle-btn");
    for (let i = 0; i < toggleBtns.length; i++) {
        if (toggleBtns[i] == srcBtn) {
            out = i;
            break;
        }
    }
    let tabs = ultParent.getElementsByClassName("tabs")[0].children;
    let tab = tabs[out];
    
    //what tab is currently open
    if (!tab.hasAttribute("open")) {
        //hides currently open tab
        for (let i = 0; i < tabs.length; i++) {
            if (tabs[i].hasAttribute("open")) {
                currentTab = tabs[i];
                currentTab.removeAttribute("open");
                break;
            }
        }
        
        //opens corrisponding tab
        tab.setAttribute("open", "");
    }
}


//IIFE - creates a new scope where btnPanel can be defined without conflicting with other variables in the global scope.
(()=>{
    //event delegation
    let btnPanel = document.querySelectorAll(".toggle-tabs .toggle-btns");
    console.log(btnPanel);
    [].forEach.call(btnPanel, (x) => {
        x.addEventListener("click", toggleTab);
    })
    
    //alternative way of writing what's above.
    // for (let i = 0; i < btnPanel.length; i++) {
    //     btnPanel[i].addEventListener("click", changeTab);
    // }
})();