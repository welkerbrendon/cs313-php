function noInput(){
    var element_to_remove = document.getElementById("custom_input");
    while(element_to_remove){
        element_to_remove.parentNode.removeChild(element_to_remove);
        element_to_remove = document.getElementById("custom_input");
    }

    element_to_remove = document.getElementById("second_custom_input");
    while(element_to_remove){
        element_to_remove.parentNode.removeChild(element_to_remove);
        element_to_remove = document.getElementById("second_custom_input");
    }
    
    element_to_remove = document.getElementById("br");
    while(element_to_remove){
        element_to_remove.parentNode.removeChild(element_to_remove);
        element_to_remove = document.getElementById("br");
    }
}
function day(){
    noInput();

    var input_item = document.createElement("input");
    input_item.setAttribute("type", "date");
    input_item.setAttribute("id", "custom_input");
    input_item.setAttribute("name", "day");
    input_item.appendChild(document.createTextNode("Desired Day"));

    var label = document.createElement("label");
    label.setAttribute("for", "custom_input");
    label.setAttribute("id", "custom_input");
    label.appendChild(document.createTextNode("Desired Day"));

    var br = document.createElement("br");
    br.setAttribute("id", "br");

    var form = document.getElementById("form");

    form.insertBefore(input_item, form.childNodes[form.childNodes.length - 2]);
    form.insertBefore(label, form.childNodes[form.childNodes.length - 2]);
    form.insertBefore(br, form.childNodes[form.childNodes.length - 2]);
}
function week(){
    noInput();

    var input_item = document.createElement("input");
    input_item.setAttribute("type", "date");
    input_item.setAttribute("id", "custom_input");
    input_item.setAttribute("name", "start_of_week");
    input_item.appendChild(document.createTextNode("Desired Week"));

    var label = document.createElement("label");
    label.setAttribute("for", "custom_input");
    label.setAttribute("id", "custom_input");
    label.appendChild(document.createTextNode("Desired Start Date"));

    var br = document.createElement("br");
    br.setAttribute("id", "br");

    var current_element = document.getElementById("custom_input");
    var form = document.getElementById("form");
    var current_month_element = document.getElementById("custom_input_month");

    form.insertBefore(input_item, form.childNodes[form.childNodes.length - 2]);
    form.insertBefore(label, form.childNodes[form.childNodes.length] - 2);
    form.insertBefore(br, form.childNodes[form.childNodes.length - 2]);
}
function month(){
    noInput();

    var input_item = document.createElement("input");
    input_item.setAttribute("type", "month");
    input_item.setAttribute("id", "custom_input");
    input_item.setAttribute("name", "month");
    input_item.appendChild(document.createTextNode("Desired Month"));

    var label = document.createElement("label");
    label.setAttribute("for", "custom_input");
    label.setAttribute("id", "custom_input");
    label.appendChild(document.createTextNode("Desired Month"));

    var br = document.createElement("br");
    br.setAttribute("id", "br");

    form.insertBefore(input_item, form.childNodes[form.childNodes.length - 2]);
    form.insertBefore(label, form.childNodes[form.childNodes.length - 2]);
    form.insertBefore(br, form.childNodes[form.childNodes.length - 2]);
}
function custom(){
    noInput();

    var input_item = document.createElement("input");
    input_item.setAttribute("type", "date");
    input_item.setAttribute("id", "custom_input");
    input_item.setAttribute("name", "start_date");

    var input_item1 = document.createElement("input");
    input_item1.setAttribute("type", "date");
    input_item1.setAttribute("id", "second_custom_input");
    input_item1.setAttribute("name", "end_date");

    var label = document.createElement("label");
    label.setAttribute("for", "custom_input");
    label.setAttribute("id", "custom_input");
    label.appendChild(document.createTextNode("Desired Start Date"));

    var second_label = document.createElement("label");
    second_label.setAttribute("for", "second_custom_input");
    second_label.setAttribute("id", "second_custom_input");
    second_label.appendChild(document.createTextNode("Desired End Date"));

    var deletable_br = document.createElement("br");
    deletable_br.setAttribute("id", "br");

    var br = document.createElement("br");
    br.setAttribute("id", "br");
    
    form.insertBefore(input_item, form.childNodes[form.childNodes.length - 2]);
    form.insertBefore(label, form.childNodes[form.childNodes.length - 2]);
    form.insertBefore(br, form.childNodes[form.childNodes.length - 2]);

    form.insertBefore(input_item1, form.childNodes[form.childNodes.length - 2]);
    form.insertBefore(second_label, form.childNodes[form.childNodes.length - 2]);
    form.insertBefore(deletable_br, form.childNodes[form.childNodes.length - 2]);
}