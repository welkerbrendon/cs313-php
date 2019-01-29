 function addToCart(button) {
    var cart = document.getElementById("cart");
    var nodeElement = document.createElement("P");
    var textElement= document.createTextNode(button.value);
    nodeElement.appendChild(textElement);
    cart.insertBefore(nodeElement, cart.childNodes[cart.childNodes.length - 3]);
}