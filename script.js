// --- CÁC HÀM TOÀN CỤC (Để HTML gọi được) ---

function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function addToCart(name, price) {
    cart.push({ name: name, price: price });
    saveCart();
    updateCart();
    alert("Đã thêm " + name + " vào giỏ!");
}

function removeItem(index) {
    cart.splice(index, 1);
    saveCart();
    updateCart();
}

function checkout() {
    if (cart.length === 0) { alert("Giỏ hàng trống!"); return; }
    let payment = document.getElementById("paymentMethod").value;
    alert("Thanh toán qua: " + payment);
    cart = []; saveCart(); updateCart();
}

// --- CÁC ĐOẠN KHỞI TẠO (Chỉ chạy khi trang web đã load xong) ---

document.addEventListener("DOMContentLoaded", function () {
    
    // 1. Logic Back to top
    let mybutton = document.getElementById("backToTopBtn");
    window.onscroll = function() {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    };

    // 2. Logic giỏ hàng
    updateCart();

    // 3. Logic tìm kiếm
    let searchInput = document.getElementById("searchInput");
    let products = document.querySelectorAll(".product");
    if(searchInput) {
        searchInput.addEventListener("keyup", function () {
            let keyword = searchInput.value.toLowerCase();
            products.forEach(function (product) {
                let name = product.getAttribute("data-name");
                product.style.display = name.includes(keyword) ? "block" : "none";
            });
        });
    }
});

// Các hàm bổ trợ giỏ hàng
let cart = JSON.parse(localStorage.getItem("cart")) || [];
function saveCart() { localStorage.setItem("cart", JSON.stringify(cart)); }

function updateCart() {
    let cartItems = document.getElementById("cartItems");
    let cartCount = document.getElementById("cartCount");
    let totalPrice = document.getElementById("totalPrice");
    if (cartCount) cartCount.innerText = cart.length;
    if (cartItems) {
        cartItems.innerHTML = "";
        let total = 0;
        cart.forEach(function (item, index) {
            total += item.price;
            cartItems.innerHTML += `<li>${item.name} - ${item.price.toLocaleString()}đ <button onclick="removeItem(${index})">Xóa</button></li>`;
        });
        if(totalPrice) totalPrice.innerText = total.toLocaleString();
    }
}