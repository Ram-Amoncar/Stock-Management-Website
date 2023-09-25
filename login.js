var AlertType = ["warning", "", "success", "info"];
function validate() {
    let username = document.forms["LoginForm"]["username"].value;
    let pass = document.forms["LoginForm"]["pass"].value;
    let errors = [];
    if (username.length == 0) errors.push("Username not entered.");
    if (pass.length == 0) errors.push("Password not entered.");
    if(errors.length>0){
        errors.forEach(ele => {
            alert_message(ele, 0);
        });
        return false;
    }else{
        return true;
    }
    
}

function alert_message(message, type) {
    type = AlertType[type]
    document.getElementById("alert_div")
        .insertAdjacentHTML('afterbegin',
            `<div class="alert ${type}"><span class="closebtn">&times;</span><strong> Warning!</strong> ${message} </div>`);
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