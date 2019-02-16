function add_row(){
    var table_row = document.getElementById("tr");
    var table = document.getElementById("table");

    var new_row = table.insert_row(table.getElementsByTagName("tr").length - 1);
    new_row = table_row;
}