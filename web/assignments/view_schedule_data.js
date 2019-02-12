function day(){
    var input_item = document.createElement("input");
    input_item.setAttribute("type", "date");
    input_item.setAttribute("id", "custom_input");
    input_item.appendChild(document.createTextNode("Desired Day"));

    var form = document.getElementById("form");
    var current_element = document.getElementById("custom_input");
    if(current_element){
        current_element.parentNode.replaceChild(input_item, current_element);
        var check_for_extra = document.getElementById("second_custom_input");
        if(check_for_extra){
            check_for_extra.parentNode.removeChild(check_for_extra);
            var br_list = form.getElementsByTagName("br");
            br_list[br_list.length - 1].remove;
        }
    }
    else{
        form.insertBefore(input_item, form.childNodes[form.childNodes.length - 2]);
        form.insertBefore(document.createElement("br"), form.childNodes[form.childNodes.length - 2]);
    }
}
function week(){
    var input_item = document.createElement("input");
    input_item.setAttribute("type", "week");
    input_item.setAttribute("id", "custom_input");
    input_item.appendChild(document.createTextNode("Desired Week"));

    var current_element = document.getElementById("custom_input");
    var form = document.getElementById("form");
    if(current_element){
        current_element.parentNode.replaceChild(input_item, current_element);
        var check_for_extra = document.getElementById("second_custom_input");
        if(check_for_extra){
            check_for_extra.parentNode.removeChild(check_for_extra);
            var br_list = form.getElementsByTagName("br");
            br_list[br_list.length - 1].remove;
        }
    }
    else{
        form.insertBefore(input_item, form.childNodes[form.childNodes.length - 2]);
        form.insertBefore(document.createElement("br"), form.childNodes[form.childNodes.length - 2]);
    }
}
function month(){
    var input_item = document.createElement("input");
    input_item.setAttribute("type", "month");
    input_item.setAttribute("id", "custom_input");
    input_item.appendChild(document.createTextNode("Desired Month"));

    var current_element = document.getElementById("custom_input");
    var form = document.getElementById("form");
    if(current_element){
        current_element.parentNode.replaceChild(input_item, current_element);
        var check_for_extra = document.getElementById("second_custom_input");
        if(check_for_extra){
            check_for_extra.parentNode.removeChild(check_for_extra);
            var br_list = form.getElementsByTagName("br");
            br_list[br_list.length - 1].remove;
        }
    }
    else{
        form.insertBefore(input_item, form.childNodes[form.childNodes.length - 2]);
        form.insertBefore(document.createElement("br"), form.childNodes[form.childNodes.length - 2]);
    }
}
function custom(){
    var input_item = document.createElement("input");
    input_item.setAttribute("type", "date");
    input_item.setAttribute("id", "custom_input");
    input_item.appendChild(document.createTextNode("Start Date"));

    var input_item1 = document.createElement("input");
    input_item1.setAttribute("type", "date");
    input_item1.setAttribute("id", "second_custom_input")
    input_item1.appendChild(document.createTextNode("End Date"));

    var current_element = document.getElementById("custom_input");
    var form = document.getElementById("form");
    if(current_element){
        current_element.parentNode.replaceChild(input_item, current_element);
        var check_for_extra = document.getElementById("second_custom_input");
        if(!check_for_extra){
            form.insertBefore(input_item1, form.childNodes[form.childNodes.length - 2]);
            form.insertBefore(document.createElement("br"), form.childNodes[form.childNodes.length - 2]);
        }
    }
    else{
        form.insertBefore(input_item, form.childNodes[form.childNodes.length - 2]);
        form.insertBefore(document.createElement("br"), form.childNodes[form.childNodes.length - 2]);

        form.insertBefore(input_item1, form.childNodes[form.childNodes.length - 2]);
        form.insertBefore(document.createElement("br"), form.childNodes[form.childNodes.length - 2]);
    }
}