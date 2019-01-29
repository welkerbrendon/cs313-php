 function addToCart(button) {
    var cart = document.getElementById("cart");
    var nodeElement = document.createElement("P");
    var buttonElement = document.createElement("BUTTON");
    buttonElement.setAttribute("onclick='removeFromCart(this)");
    var inputButtonText = document.createTextNode("Remove");
    buttonElement.appendChild(inputButtonText);
    var textElement= document.createTextNode(button.value);
    nodeElement.appendChild(textElement).appendChild(buttonElement);
    cart.insertBefore(nodeElement, cart.childNodes[cart.childNodes.length - 3]);
}