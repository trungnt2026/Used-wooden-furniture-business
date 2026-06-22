// Khởi tạo giỏ hàng từ localStorage
let cart = JSON.parse(localStorage.getItem("cart")) || [];

// Hàm lưu giỏ hàng
function saveCart() { 
    localStorage.setItem("cart", JSON.stringify(cart)); 
}

// --- CÁC HÀM TOÀN CỤC ---

function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function addToCart(name, price, image = '') {
    let existingItem = cart.find(item => item.name === name);
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ name: name, price: price, quantity: 1, image: image });
    }
    saveCart();
    updateCart();
    updateCartCount();
    alert("Đã thêm " + name + " vào giỏ!");
}

function removeFromCart(index) {
    cart.splice(index, 1);
    saveCart();
    updateCart();
}

function updateCartCount() {
    const cartCountContainer = document.getElementById("cartCount");
    if (cartCountContainer) {
        // Tính tổng số lượng của tất cả sản phẩm đang có trong giỏ
        let totalCount = cart.reduce((sum, item) => sum + (item.quantity || 1), 0);
        cartCountContainer.innerText = totalCount;
    }
}

function checkout() {
    if (cart.length === 0) { alert("Giỏ hàng trống!"); return; }
    let paymentMethodInput = document.getElementById("paymentMethod");
    let payment = paymentMethodInput ? paymentMethodInput.value : "Chưa chọn phương thức";
    alert("Thanh toán qua: " + payment);
    cart = []; 
    saveCart(); 
    updateCart();
}

// Hàm cập nhật giỏ hàng đổ vào Table Bootstrap
function updateCart() {
    const cartItemsContainer = document.getElementById("cartItems");
    if (!cartItemsContainer) return; // Nếu không ở trang giỏ hàng thì bỏ qua

    cartItemsContainer.innerHTML = ""; 

    if (cart.length === 0) {
        cartItemsContainer.innerHTML = `<tr><td colspan="6" class="text-center py-4 text-muted">Giỏ hàng trống</td></tr>`;
        updateTotalPrice();
        updateCartCount();
        return;
    }

    cart.forEach((item, index) => {
        const row = document.createElement("tr");

        row.innerHTML = `
            <td>
                <img src="${item.image || 'https://via.placeholder.com/70'}" class="product-img" style="width:70px; height:70px; object-fit:cover; border-radius:8px;" alt="${item.name}">
            </td>
            <td>
                <h6 class="mb-0 fw-bold text-wood">${item.name}</h6>
            </td>
            <td class="text-nowrap">
                ${Number(item.price).toLocaleString('vi-VN')}đ
            </td>
            <td class="text-center">
                <span class="fw-semibold">${item.quantity || 1}</span>
            </td>
            <td class="fw-bold text-wood text-nowrap">
                ${Number(item.price * (item.quantity || 1)).toLocaleString('vi-VN')}đ
            </td>
            <td class="text-center">
                <button onclick="removeFromCart(${index})" class="btn btn-sm btn-outline-danger px-2 py-1">✕</button>
            </td>
        `;
        cartItemsContainer.appendChild(row);
    });

    updateTotalPrice(); 
}

// Hàm cập nhật tổng tiền
function updateTotalPrice() {
    const totalPriceContainer = document.getElementById("totalPrice");
    if (totalPriceContainer) {
        let total = cart.reduce((sum, item) => sum + (Number(item.price) * (item.quantity || 1)), 0);
        totalPriceContainer.innerText = total.toLocaleString('vi-VN');
    }
}

// --- CÁC ĐOẠN KHỞI TẠO ---

document.addEventListener("DOMContentLoaded", function () {
    // 1. Logic Back to top
    let mybutton = document.getElementById("backToTopBtn");
    if (mybutton) {
        window.onscroll = function() {
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        };
    }

    // 2. Logic giỏ hàng
    updateCart();
    updateCartCount();

    // 3. Logic tìm kiếm
    let searchInput = document.getElementById("searchInput");
    let products = document.querySelectorAll(".product");
    if(searchInput) {
        searchInput.addEventListener("keyup", function () {
            let keyword = searchInput.value.toLowerCase();
            products.forEach(function (product) {
                let name = product.getAttribute("data-name") ? product.getAttribute("data-name").toLowerCase() : "";
                product.style.display = name.includes(keyword) ? "block" : "none";
            });
        });
    }
});