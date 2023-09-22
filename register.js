function validate() {
    let username = document.forms["RegForm"]["username"].value;
    let email = document.forms["RegForm"]["email"].value;
    let pass1 = document.forms["RegForm"]["pass"].value;
    let pass2 = document.forms["RegForm"]["cPass"].value;
    if(username.length==0){
        alert("Enter username");
        return false;
    } 
    else if(email.length==0){
        alert("Enter email");
        return false;
    } 
    else if(pass1.length==0){
        alert("Enter password");
        return false;
    }else if(pass2.length==0){
        alert("Enter confirm password");
        return false;
    } 
    else if (pass1 != pass2) {
        alert("Password fields do not match");            
        return false;
    }else{
        return true;
    }
}