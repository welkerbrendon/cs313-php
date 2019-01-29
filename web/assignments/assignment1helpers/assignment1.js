 function addToCart(button) {
    var cart = document.getElementById("cart");
    var inputButtonHTML = "  <button onClick='removeFromCart(this)'>Remove</button></p>";
    var element="<p>" + button.value + inputButtonHTML;
    cart.insertBefore(element, cart.childNodes[cart.childNodes.length - 3]);
}