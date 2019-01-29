 function addToCart(button) {
    var cart = document.getElementById("cart");
    var nodeElement = document.createElement("P");
    var inputButtonHTML = "  <button onClick='removeFromCart(this)'>Remove</button>";
    var textElement= document.createTextNode(button.value + inputButtonHTML);
    nodeElement.appendChild(textElement);
    cart.insertBefore(nodeElement, cart.childNodes[cart.childNodes.length - 2]);
}