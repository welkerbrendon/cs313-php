function day(){
    var input_item = document.createElement("input");
    input_item.setAttribute("type", "date");
    input_item.appendChild(document.createTextNode("Desired Day"));

    var form = document.getElementById("form");
    form.insertBefore(input_item, form.childNodes[form.childNodes.length - 2]);
}
function week(){

}
function month(){

}
function custom(){

}