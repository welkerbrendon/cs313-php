function day(){
    var input_item = document.createElement("input").setAttribute(type, "date").appendChild(document.createTextNode("Desired Day"));

    var form = document.getElementById("form");
    form.insertBefore(input_item, form.childNodes[form.childNodes.length - 2]);
}
function week(){

}
function month(){

}
function custom(){

}