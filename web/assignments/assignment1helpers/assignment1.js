 function addToCart(button) {
    
}

function addToForms(textElement, valueTotal) {
    var nodeElement = document.createElement("INPUT");
    nodeElement.setAttribute("class", "invisable-form");
    nodeElement.setAttribute("name", "items");

    var cartForm = document.getElementById("cart-form");
    cartForm.appendChild(nodeElement);

    var totalCartForm = document.getElementById("cart-total");
    totalCartForm.setAttribute("value", valueTotal);
}