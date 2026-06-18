// tìm SP
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

// giỏ hàng

let cart = JSON.parse(localStorage.getItem("cart")) || [];
let total = 0;

function saveCart() {
    localStorage.setItem("cart", JSON.stringify(cart));
}

function addToCart(name, price) {

    cart.push ({
        name: name,
        price: price
    });

    saveCart();
    updateCart();

    alert("Đã thêm " + name + " vào giỏ hàng!");
}

function updateCart() {

    let cartItems = document.getElementById("cartItems");

    cartItems.innerHTML = "";

    total = 0;

    cart.forEach(function(item, index) {

        total += item.price;

        cartItems.innerHTML += `

        <li>
            ${item.name} - ${item.price.toLocaleString()}đ
            <button onclick="removeItem(${index})">
                Xóa
            </button>
        </li>
        `;
    });

    document.getElementById("cartCount").innerText = cart.length;

    document.getElementById("totalPrice").innerText = total.toLocaleString();

}

function checkout() {

    if(cart.length === 0) {
        alert("Giỏ hàng đang trống");
        return;
    }
    
    alert("Thanh toán thành công!");

    cart = [];

    updateCart();

}

function removeItem(index) {

    cart.splice(index, 1);

    saveCart();
    updateCart();
}

function updateCart() {
    let cartItems = document.getElementById("cartItems");

    cartItems.innerHTML = "";

    total = 0;

    cart.forEach(function(item, index) {

        total += item.price;

        cartItems.innerHTML += `
        <li>
            ${item.name} - ${item.price.toLocaleString()}đ
            <button onclick="removeItem(${index})">
                Xóa
            </button>
        </li>
        `;
    });
    document.getElementById("cartCount").innerText = cart.length;
    document.getElementById("totalPrice").innerText = total.toLocaleString();

}

function checkout() {

    if (cart.length === 0) {
        alert("Giỏ hàng trống!");
        return;
    }

    let payment =
            document.getElementById("paymentMethod").value;

    if (payment === "cod") {
        alert("Đặt hàng thành công - Thanh toán khi nhận hàng.");
    }
    else if (payment === "visa/master") {
        alert("Chuyển sang cổng thanh toán Visa/Master.");
    }
    else {
        alert("Chuyển sang thanh toán Momo.");
    }
        cart = [];
        saveCart();
        updateCart();
}

updateCart();