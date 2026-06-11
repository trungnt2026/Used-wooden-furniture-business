// Tim san pham
let searchInput = document.getElementById('searchInput');
let products = document.querySelectorAll('.product');

searchInput.addEventListener("keyup", function() {
    let keyword = searchInput.value.toLowerCase();

    products.forEach(function(product) {
        let name = product.getAttribute("data-name");

        if (name.includes(keyword)) {
            product.style.display = "block";
        } else {
            product.style.display = "none";
        }
    });
});

// gio hang

let cart = [];
let total = 0;

function addToCart(name, price) {

    cart.push ({
        name: name,
        price: price
    });

    total = total + price;

    document.getElementById("cartCount").innerText = cart.length;

    let cartItems = document.getElementById("cartItems");

    let li = document.createElement("li");
    li.innerText = name + " - " + price.toLocaleString() + "đ";

    cartItems.appendChild(li);

    document.getElementById("totalPrice").innerText = total.toLocaleString();

    alert("Đã thêm " + name + " vào giỏ hàng!");
}