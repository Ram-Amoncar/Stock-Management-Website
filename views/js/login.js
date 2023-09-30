
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
function validate() {
    let username = document.forms["LoginForm"]["username"].value;
    let pass = document.forms["LoginForm"]["pass"].value;
    let errors = [];
    if (username.length == 0) errors.push("Username is empty.");
    if (pass.length == 0) errors.push("Password is empty.");
    if (errors.length > 0) {
        errors.forEach(ele => {
            alert_message(ele, 0);
        });
        return false;
    } else {
        return true;
    }

}
