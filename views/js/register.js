function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
function validate() {
    let username = document.forms["RegForm"]["username"].value;
    let email = document.forms["RegForm"]["email"].value;
    let pass1 = document.forms["RegForm"]["pass"].value;
    let pass2 = document.forms["RegForm"]["cPass"].value;
    let errors = [];
    if (username.length == 0) errors.push("Username is empty.");
    if (email.length == 0) errors.push("Email is empty.");
    if (pass1.length == 0) errors.push("Password is empty.");
    if (pass2.length == 0) errors.push("Confirm password is empty.");
    if (pass1 != pass2) errors.push("Password fields do not match.");

    if (errors.length > 0) {
        errors.forEach(ele => {
            alert_message(ele, 0);
        });
        return false;
    } else {
        return true;
    }
}
function setIntputs(email, pass) {
    document.forms["RegForm"]["email"].value = email;
    document.forms["RegForm"]["pass"].value = document.forms["RegForm"]["cPass"].value = pass;
}
