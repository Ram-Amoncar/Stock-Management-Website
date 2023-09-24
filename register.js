var AlertType = ["warning", "", "success", "info"];
function validate() {
    let username = document.forms["RegForm"]["username"].value;
    let email = document.forms["RegForm"]["email"].value;
    let pass1 = document.forms["RegForm"]["pass"].value;
    let pass2 = document.forms["RegForm"]["cPass"].value;
    let errors = [];
    if (username.length == 0) errors.push("Username not entered.");
    if (email.length == 0) errors.push("Email not entered.");
    if (pass1.length == 0) errors.push("Password not entered.");
    if (pass2.length == 0) errors.push("Confirm password not entered.");
    if (pass1 != pass2) errors.push("Password fields do not match.");

    if(errors.length>0){
        errors.forEach(ele => {
            alert_message(ele, 0);
        });
        return false;
    }else{
        return true;
    }
    
}

function setIntputs(email,pass){
    document.forms["RegForm"]["email"].value = email;
    document.forms["RegForm"]["pass"].value = document.forms["RegForm"]["cPass"].value = pass;
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