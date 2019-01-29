 function addToCart(button) {
    var inputButtonHTML = "  <button onClick='removeFromCart(this)'>Remove</button></p>";
    var element="<p>" + button.value + inputButtonHTML;
    document.getElementById("cart").insertBefore(element, cart.childNodes[cart.childNodes.length - 2]);
}