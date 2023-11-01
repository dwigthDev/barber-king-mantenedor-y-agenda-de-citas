// cart
let cartIcon = document.querySelector("#cart-icon");
let cart = document.querySelector(".cart");
let closeCart = document.querySelector("#close-cart");
//abrir carrito
cartIcon.onclick = () =>{
    cart.classList.add("active");
};
//cerrar carrito
closeCart.onclick = () => {
    cart.classList.remove("active");
};

// carrito js
if (document.readyState == "loading"){
    document.addEventListener("DOMContentLoaded", ready);
} else {
    ready();
}
 
//making function
function ready(){
    //quitar items del carrito
    var removeCartButtons = document.getElementsByClassName("cart-remove");
    console.log(removeCartButtons);
    for (var i = 0; i < removeCartButtons.length; i++){
        var button = removeCartButtons[i];
        button.addEventListener("click", removeCartItem);
    }

    var quantityInputs = document.getElementsByClassName("cart-quantity");
    for (var i = 0; i < quantityInputs.length; i++){
        var input = quantityInputs[i];
        input.addEventListener("change", quantityChanged);
    }
    var addCart = document.getElementsByClassName("add-cart");
    for (var i = 0; i < addCart.length; i++) {
        var button = addCart[i];
        button.addEventListener("click", addCartClicked);
    }
    document.getElementsByClassName("btn-buy")[0].addEventListener("click", buyButtonClicked);
}
function buyButtonClicked(){
    alert ("su pedido se ha realizado.");
    var cartContent = document.getElementsByClassName("cart-contenido")[0];
    while (cartContent.hasChildNodes()){
        cartContent.removeChild(cartContent.firstChild);
    }
    updateTotal();
}


//quitar items del carrito
function removeCartItem(event) {
    var buttonClicked = event.target;
    buttonClicked.parentElement.remove();
    updateTotal();
}

function quantityChanged(event) {
    var input = event.target;
    if (isNaN(input.value) || input.value <= 0){
        input.value = 1;
    }
    updateTotal();
}

function addCartClicked(event) {
    var button = event.target;
    var shopProducts = button.parentElement;
    var titulo = shopProducts.querySelector(".producto-titulo").innerText;
    var precio = shopProducts.querySelector(".precio").innerText;
    var productImg = shopProducts.querySelector(".producto-img").src;
    addProductToCart(titulo, precio, productImg);
    updateTotal();
}

function addProductToCart(titulo, precio, productImg) {
    var cartItems = document.querySelector(".cart-contenido");
    var cartItemsNames = cartItems.getElementsByClassName("cart-producto-titulo");

    for (var i = 0; i < cartItemsNames.length; i++) {
        if (cartItemsNames[i].innerText === titulo) {
            alert("Ya agregaste este item a la bolsa.");
            return;
        }
    }

    var cartShopBox = document.createElement("div");
    cartShopBox.classList.add("cart-box");

    var cartBoxContent = `
        <img src="${productImg}" alt="" class="producto-img">
        <div class="detail-box">
            <div class="cart-producto-titulo">${titulo}</div>
            <div class="cart-precio">${precio}</div>
            <input type="number" value="1" class="cart-quantity">
        </div>
        <!--quitar cart-->
        <i class='bx bx-trash cart-remove'></i>`;
    
    cartShopBox.innerHTML = cartBoxContent;
    cartItems.appendChild(cartShopBox);

    cartShopBox.querySelector(".cart-remove").addEventListener("click", removeCartItem);
    cartShopBox.querySelector(".cart-quantity").addEventListener("change", quantityChanged);

    updateTotal();
}

function updateTotal() {
    var cartBoxes = document.getElementsByClassName("cart-box");
    var total = 0;
    for (var i = 0; i < cartBoxes.length; i++) {
        var cartBox = cartBoxes[i];
        console.log(cartBox);
        var detail = cartBox.getElementsByClassName('detail-box')[0];
        console.log(detail);
        var priceElement = detail.getElementsByClassName("cart-precio")[0].textContent;
        console.log(priceElement);
        var quantityElement = detail.getElementsByClassName("cart-quantity")[0];
        console.log(quantityElement);
        var precio = parseFloat(priceElement.replace("$", ""));
        console.log(precio);
        var quantity = parseFloat(quantityElement.value);
        console.log(quantity);
        total += precio * quantity;
        console.log(total);

        document.getElementsByClassName("total-precio")[0].textContent = "$" + total;
    }
    
}
