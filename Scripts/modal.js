window.onclick = function(event) {
	if (event.target.classList.contains("modal")) {
	let modal = document.querySelector(".modal[open]");
	modal.style.display = "none";
	}
}

function openModal(id) {
	let modal = document.getElementById(id);
	modal.style.display = "block";
	modal.setAttribute("open", "");
}

function closeModal() {
	let modal = document.querySelector(".modal[open]");
	modal.style.display = "none";
	modal.removeAttribute("open");
	
}

var btns = document.querySelectorAll(".modal .close");
for (let i = 0; i < btns.length; i ++) {
	btns[i].onclick = closeModal;
}