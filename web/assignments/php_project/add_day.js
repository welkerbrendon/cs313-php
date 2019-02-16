function add_row(){
    var table_row = document.getElementById("tr");
    var table = document.getElementById("table");

    var new_row = table.add_row(table.getElementsByTagName("tr").length);
    new_row = table_row;
}