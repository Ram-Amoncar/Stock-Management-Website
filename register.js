function validate() {
    let username = document.forms["RegForm"]["username"].value;
    let email = document.forms["RegForm"]["email"].value;
    let pass1 = document.forms["RegForm"]["pass"].value;
    let pass2 = document.forms["RegForm"]["cPass"].value;
    if(username.length==0){
        alert_message("Username not entered.");
        return false;
    } 
    else if(email.length==0){
        alert_message("Email not entered.");
        return false;
    } 
    else if(pass1.length==0){
        alert_message("Password not entered.");
        return false;
    }else if(pass2.length==0){
        alert_message("Confirm password not entered.");
        return false;
    } 
    else if (pass1 != pass2) {
        alert_message("Password fields do not match.");       
        return false;
    }
    return true;
}
function alert_message(message){
    document.getElementById("alert_div").innerHTML="<div class='alert warning'><span class='closebtn'>&times;</span><strong>Warning!</strong> "+message+"</div>";
    var close = document.getElementsByClassName("closebtn");
    var i;

    for (i = 0; i < close.length; i++) {
            close[i].onclick = function(){
            var div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function(){ div.style.display = "none"; }, 600);
        }
        //setTimeout(close[i].click(),5000)
    }
}