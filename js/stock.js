document.forms["StockForm"]["delete"].disabled = true;
document.forms["StockForm"]["edit"].disabled = true;
function validate(){
    let name = document.forms["StockForm"]["name"].value;
    let quantity = document.forms["StockForm"]["quantity"].value;
    let cpu = document.forms["StockForm"]["cpu"].value;
    let total_cost = document.forms["StockForm"]["total_cost"].value;
    let errors = [];
    if (name.length == 0) errors.push("Name is empty.");
    if (cpu.length == 0) errors.push("Cost per unit is empty.");
    if (quantity.length == 0) errors.push("Quantity is empty.");
    if (total_cost.length == 0) errors.push("Total cost is empty.");
    if(errors.length>0){
        errors.forEach(ele => {
            alert_message(ele, 0);
        });
        console.log("hello");
        return false;
    }else{
        console.log("hello true");
        return true;
    }
}

function findTotal_cost(){
    let quantity = document.forms["StockForm"]["quantity"].value;
    let cpu = document.forms["StockForm"]["cpu"].value;
    if(quantity.length>0 && cpu.length>0){
        document.forms["StockForm"]["total_cost"].value=(cpu*quantity).toString();
    }
    document.forms["StockForm"]["delete"].disabled = false;
    document.forms["StockForm"]["edit"].disabled = false;
}

function fieldBuilder(id){
    let tr = document.getElementById(id.toString());
    let tdList = tr.getElementsByTagName('td');
    document.forms["StockForm"]["name"].value=tdList[0].innerText;
    document.forms["StockForm"]["quantity"].value=tdList[1].innerText;
    document.forms["StockForm"]["cpu"].value=tdList[2].innerText;
    document.forms["StockForm"]["total_cost"].value=tdList[3].innerText;
}
function checkDelete(){
    if(!confirm("Do you want to delete ?")){
        preventDefault();
    }
}
function disable(){
    document.forms["StockForm"]["delete"].disabled = true;
    document.forms["StockForm"]["edit"].disabled = true;
}