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
}

function fieldBuilder(id){
    let tr = document.getElementById(id.toString());
    let tdList = tr.getElementsByTagName('td');
    console.log(tdList);
    console.log(id);
}