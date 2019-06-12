function changeTab() {
    //Debugging
    // console.log(event);
    let srcBtn = event.target;
    let btnPanel = event.currentTarget;

    //only runs the function if a button was pressed
    let targetIsBtn = srcBtn.tagName == "BUTTON";
    let isTogglePanelBtn = srcBtn.parentElement.classList.contains("toggle-btns");
    if (!targetIsBtn || !isTogglePanelBtn) {
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
    var out;
    for (let i = 0; i < btnPanel.children.length; i++) {
        if (btnPanel.children[i] == srcBtn) {
            out = i;
            break;
        }
    }
    let tabs = ultParent.getElementsByClassName("tabs")[0].children;
    let tab = tabs[out];
    
    //hides currently open tab and displays corrisponding tab.
    for (let i = 0; i < tabs.length; i++) {
        if (tabs[i].hasAttribute("open")) {
            currentTab = tabs[i];
            if (currentTab && currentTab != tab) {
                currentTab.removeAttribute("open");
            }    
            break;
        }
    }
     
    //open tab
    tab.setAttribute("open", "");


}

//event delegation
let btnPanel = document.querySelectorAll(".toggle-tabs .toggle-btns");
Array().forEach.call(btnPanel, (x) => {
    x.addEventListener("click", changeTab);
})

//alternative way of writing what's above.
// for (let i = 0; i < btnPanel.length; i++) {
//     btnPanel[i].addEventListener("click", changeTab);
// }