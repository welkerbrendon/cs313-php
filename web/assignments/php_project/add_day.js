function add_row(){
    var table_row = document.getElementById("tr");
    var table = document.getElementById("table");

    var new_row = table.insertRow(table.rows.length);
    new_row.innerHTML = table_row.innerHTML;

    return false;
}

function delete_row(){
    var table = document.getElementById("table");
    table.deleteRow(table.rows.length);

    return false;
}