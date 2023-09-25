var AlertClass = ["warning", "", "success", "info"];
var AlertTypes = ["Warning 🤨", "Error 😥", "Success 😄", "Info 🤯"];

function alert_message(message, AType) {
    AClass = AlertClass[AType];
    AType = AlertTypes[AType];
    document.getElementById("alert_div")
        .insertAdjacentHTML('beforeend',
            `<div class="alert ${AClass}"><span class="closebtn">&times;</span><strong> ${AType} </strong> ${message} </div>`);
    var close = document.getElementsByClassName("closebtn");
    var i;
    for (i = 0; i < close.length; i++) {
        close[i].onclick = function () {
            var div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function () { div.style.display = "none"; }, 600);
        }
        setTimeout(removeAlert, 5000, close[i].parentElement)
    }
}

function removeAlert(div) {
    div.style.opacity = "0";
    setTimeout(function () {
        div.style.display = "none";
        div.remove();
    }, 600);
}