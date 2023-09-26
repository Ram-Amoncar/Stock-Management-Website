function validate(){
    let name = document.forms["StockForm"]["name"].value;
    let quantity = document.forms["StockForm"]["quantity"].value;
    let cpu = document.forms["StockForm"]["cpu"].value;
    let total_cost = document.forms["StockForm"]["total_cost"].value;
    if (name.length == 0) errors.push("Name not entered.");
    if (cpu.length == 0) errors.push("CPU not entered.");
    if (quantity.length == 0) errors.push("Quantity not entered.");
    if (total_cost.length == 0) errors.push("Total cost not entered.");
    if(errors.length>0){
        errors.forEach(ele => {
            alert_message(ele, 0);
        });
        return false;
    }else{
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