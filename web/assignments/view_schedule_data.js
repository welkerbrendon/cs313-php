function day(){
    var input_item = document.createElement("input");
    input_item.setAttribute("type", "date");
    input_item.appendChild(document.createTextNode("Desired Day"));

    var form = document.getElementById("form");
    var element_to_replace = form.childNodes[form.childNodes.length - 3];
    form.replaceChile(input_item, element_to_replace);
    form.insertBefore(document.createElement("br"), form.childNodes[form.childNodes.length - 2]);
}
function week(){
    var input_item = document.createElement("input");
    input_item.setAttribute("type", "week");
    input_item.appendChild(document.createTextNode("Desired Week"));

    var form = document.getElementById("form");
    var element_to_replace = form.childNodes[form.childNodes.length - 3];
    form.replaceChile(input_item, element_to_replace);
    form.insertBefore(document.createElement("br"), form.childNodes[form.childNodes.length - 2]);
}
function month(){
    var input_item = document.createElement("input");
    input_item.setAttribute("type", "month");
    input_item.appendChild(document.createTextNode("Desired Month"));

    var form = document.getElementById("form");
    var element_to_replace = form.childNodes[form.childNodes.length - 3];
    form.replaceChile(input_item, element_to_replace);
    form.insertBefore(document.createElement("br"), form.childNodes[form.childNodes.length - 2]);
}
function custom(){
    var input_item = document.createElement("input");
    input_item.setAttribute("type", "date");
    input_item.appendChild(document.createTextNode("Start Date"));

    var input_item1 = document.createElement("input");
    input_item1.setAttribute("type", "date");
    input_item1.appendChild(document.createTextNode("End Date"));

    var form = document.getElementById("form");
    var element_to_replace = form.childNodes[form.childNodes.length - 3];
    form.replaceChile(input_item, element_to_replace);
    form.insertBefore(document.createElement("br"), form.childNodes[form.childNodes.length - 2]);

    element_to_replace = form.childNodes[form.childNodes.length - 3];
    form.replaceChile(input_item, element_to_replace);
    form.insertBefore(document.createElement("br"), form.childNodes[form.childNodes.length - 2]);
}