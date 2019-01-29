 function addToCart(button) {
    var cart = document.getElementById("cart");
    var nodeElement = document.createElement("P");
    var textElement;
    switch (button.value){
        case "25000":
            textElement = document.createTextNode("1964.5 Convertable: $25,000");
            break;
        case "45000":
            textElement = document.createTextNode("1965 GT350: $45,000");
            break;
        case "65000":
            textElement = document.createTextNode("1967 GT500: $65,000");
            break;
        case "300000":
            textElement = document.createTextNode("1969 Boss 429: $300,000");
            break;
        default:
            return;
    }
    nodeElement.appendChild(textElement);
    cart.insertBefore(nodeElement, cart.firstChild);

    var totalElementValue = parseInt(document.getElementById("total").getAttribute("value"));
    totalElement.setAttribute("value", totalElementValue + parseInt(button.value));
    document.getElementById("total").innerHTML = "Total: $" + totalElementValue + ".00";
}