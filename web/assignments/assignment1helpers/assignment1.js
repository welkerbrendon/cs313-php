 function addToCart(button) {
    var cart = document.getElementById("cart");
    var inputButtonHTML = "  <button onClick='removeFromCart(this)'>Remove</button></p>";
    var elementToInsert="<p>" + button.value + inputButtonHTML;
    cart.insertBefore(elementToInsert, cart.childNodes[cart.childNodes.length - 2]);
}