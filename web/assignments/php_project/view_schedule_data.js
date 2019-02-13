function noInput(){
    var element_to_remove = document.getElementById("custom_input");
    if(element_to_remove){
        element_to_remove.parentNode.removeChild(element_to_remove);
        var input_br = document.getElementById("input_br");
        input_br.parentNode.removeChild(input_br);
    }
    var check_for_extra = document.getElementById("second_custom_input");
    if(check_for_extra){
        var deletable_br = document.getElementById("deletable");
        deletable_br.parentNode.removeChild(deletable_br);

        var second_input = document.getElementById("second_custom_input");
        second_input.parentNode.removeChild(second_input);
    }
}
function day(){
    var input_item = document.createElement("input");
    input_item.setAttribute("type", "date");
    input_item.setAttribute("id", "custom_input");
    input_item.setAttribute("name", "day");
    input_item.appendChild(document.createTextNode("Desired Day"));

    var br = document.createElement("br");
    br.setAttribute("id", "input_br");

    var form = document.getElementById("form");
    var current_element = document.getElementById("custom_input");
    if(current_element){
        current_element.parentNode.replaceChild(input_item, current_element);
        var check_for_extra = document.getElementById("second_custom_input");
        if(check_for_extra){
            check_for_extra.parentNode.removeChild(check_for_extra);
            var br_list = form.getElementsByTagName("br");
            var deletable_br = document.getElementById("deletable");
            deletable_br.parentNode.removeChild(deletable_br);
        }
    }
    else{
        form.insertBefore(input_item, form.childNodes[form.childNodes.length - 2]);
        form.insertBefore(br, form.childNodes[form.childNodes.length - 2]);
    }
}
function week(){
    var input_item = document.createElement("input");
    input_item.setAttribute("type", "date");
    input_item.setAttribute("id", "custom_input");
    input_item.setAttribute("name", "start_of_week");
    input_item.appendChild(document.createTextNode("Desired Week"));

    var br = document.createElement("br");
    br.setAttribute("id", "input_br");

    var current_element = document.getElementById("custom_input");
    var form = document.getElementById("form");
    if(current_element){
        current_element.parentNode.replaceChild(input_item, current_element);
        var check_for_extra = document.getElementById("second_custom_input");
        if(check_for_extra){
            check_for_extra.parentNode.removeChild(check_for_extra);
            var br_list = form.getElementsByTagName("br");
            var deletable_br = document.getElementById("deletable");
            deletable_br.parentNode.removeChild(deletable_br);
        }
    }
    else{
        form.insertBefore(input_item, form.childNodes[form.childNodes.length - 2]);
        form.insertBefore(br, form.childNodes[form.childNodes.length - 2]);
    }
}
function month(){
    var input_item = document.createElement("input");
    input_item.setAttribute("type", "month");
    input_item.setAttribute("id", "custom_input");
    input_item.setAttribute("name", "month");
    input_item.appendChild(document.createTextNode("Desired Month"));

    var br = document.createElement("br");
    br.setAttribute("id", "input_br");

    var current_element = document.getElementById("custom_input");
    var form = document.getElementById("form");
    if(current_element){
        current_element.parentNode.replaceChild(input_item, current_element);
        var check_for_extra = document.getElementById("second_custom_input");
        if(check_for_extra){
            check_for_extra.parentNode.removeChild(check_for_extra);
            var br_list = form.getElementsByTagName("br");
            var deletable_br = document.getElementById("deletable");
            deletable_br.parentNode.removeChild(deletable_br);
        }
    }
    else{
        form.insertBefore(input_item, form.childNodes[form.childNodes.length - 2]);
        form.insertBefore(br, form.childNodes[form.childNodes.length - 2]);
    }
}
function custom(){
    var input_item = document.createElement("input");
    input_item.setAttribute("type", "date");
    input_item.setAttribute("id", "custom_input");
    input_item.setAttribute("name", "start_date");
    input_item.appendChild(document.createTextNode("Start Date"));

    var input_item1 = document.createElement("input");
    input_item1.setAttribute("type", "date");
    input_item1.setAttribute("id", "second_custom_input");
    input_item.setAttribute("name", "end_date");
    input_item1.appendChild(document.createTextNode("End Date"));

    var deletable_br = document.createElement("br");
    deletable_br.setAttribute("id", "deletable");

    var br = document.createElement("br");
    br.setAttribute("id", "input_br");

    var current_element = document.getElementById("custom_input");
    var form = document.getElementById("form");
    if(current_element){
        current_element.parentNode.replaceChild(input_item, current_element);
        var check_for_extra = document.getElementById("second_custom_input");
        if(!check_for_extra){
            form.insertBefore(input_item1, form.childNodes[form.childNodes.length - 2]);
            form.insertBefore(deletable_br, form.childNodes[form.childNodes.length - 2]);
        }
    }
    else{
        form.insertBefore(input_item, form.childNodes[form.childNodes.length - 2]);
        form.insertBefore(br, form.childNodes[form.childNodes.length - 2]);

        form.insertBefore(input_item1, form.childNodes[form.childNodes.length - 2]);
        form.insertBefore(deletable_br, form.childNodes[form.childNodes.length - 2]);
    }
}