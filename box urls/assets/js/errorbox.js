var box = document.getElementById("boxerror");
var textbox = document.getElementById("boxerror-text");
function closebox() {
    box.style.display = "none";
}

function show(message) {
    box.style.display = "block";
    textbox.innerText = message;
}