window.onload = function () {
    document.getElementById("editBtn").setAttribute('disabled', "true");
    document.getElementById("delBtn").setAttribute('disabled', "true");
}
function validate() {
    let id = document.forms["StockForm"]["id"].value;
    let name = document.forms["StockForm"]["name"].value;
    let quantity = document.forms["StockForm"]["quantity"].value;
    let cpu = document.forms["StockForm"]["cpu"].value;
    let total_cost = document.forms["StockForm"]["total_cost"].value;
    let errors = [];
    if (id.length == 0) errors.push("Item ID is empty.");
    if (name.length == 0) errors.push("Name is empty.");
    if (cpu.length == 0) errors.push("Cost per unit is empty.");
    if (quantity.length == 0) errors.push("Quantity is empty.");
    if (total_cost.length == 0) errors.push("Total cost is empty.");
    if (errors.length > 0) {
        errors.forEach(ele => {
            alert_message(ele, 0);
        });
        return false;
    } else {
        return true;
    }
}

function findTotal_cost() {
    let quantity = document.forms["StockForm"]["quantity"].value;
    let cpu = document.forms["StockForm"]["cpu"].value;
    if (quantity.length > 0 && cpu.length > 0) {
        document.forms["StockForm"]["total_cost"].value = (cpu * quantity).toString();
    }
}

function fieldBuilder(id) {
    let tr = document.getElementById(id.toString());
    let tdList = tr.getElementsByTagName('td');
    document.forms["StockForm"]["id"].value = tdList[0].innerText;
    document.forms["StockForm"]["name"].value = tdList[1].innerText;
    document.forms["StockForm"]["quantity"].value = tdList[2].innerText;
    document.forms["StockForm"]["cpu"].value = tdList[3].innerText;
    document.forms["StockForm"]["total_cost"].value = tdList[4].innerText;
    window.location='#StockForm';
    document.forms["StockForm"]["id"].setAttribute('readonly','true');
    disableBtn()
}

function disableBtn(){
    document.getElementById("editBtn").removeAttribute('disabled');
    document.getElementById("delBtn").removeAttribute('disabled');
}
function clearFields(){
    alert_message('Text fields cleared',3);
    document.getElementById("editBtn").setAttribute('disabled', "true");
    document.getElementById("delBtn").setAttribute('disabled', "true");
    document.forms["StockForm"]["id"].removeAttribute('readonly');
}