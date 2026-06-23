let cart = JSON.parse(localStorage.getItem("cart")) || [];

function saveCart() { 
    localStorage.setItem("cart", JSON.stringify(cart)); 
}


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
    if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng không?")) {
        cart.splice(index, 1);
        saveCart();
        updateCart();
        updateCartCount();
    }
}

function changeQuantity(index, delta) {
    if (!cart[index]) return;

    let currentQty = parseInt(cart[index].quantity) || 1;
    let newQty = currentQty + delta;

    if (newQty < 1) {
        if (confirm("Bạn có muốn xóa sản phẩm này khỏi giỏ hàng?")) {
            cart.splice(index, 1);
        } else {
            cart[index].quantity = 1;
        }
    } else {
        cart[index].quantity = newQty;
    }

    saveCart();
    updateCart();      
    updateCartCount(); 
}

function updateCartCount() {
    const cartCountContainer = document.getElementById("cartCount");
    if (cartCountContainer) {
        let totalCount = cart.reduce((sum, item) => sum + (parseInt(item.quantity) || 1), 0);
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
    updateCartCount();
}

function updateCart() {
    const cartItemsContainer = document.getElementById("cartItems");
    if (!cartItemsContainer) return; 

    cartItemsContainer.innerHTML = ""; 

    if (cart.length === 0) {
        cartItemsContainer.innerHTML = `<tr><td colspan="6" class="text-center py-4 text-muted">Giỏ hàng trống</td></tr>`;
        updateTotalPrice();
        updateCartCount();
        return;
    }

    cart.forEach((item, index) => {
        const row = document.createElement("tr");
        let itemQty = parseInt(item.quantity) || 1;
        let itemTotal = Number(item.price) * itemQty;

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
                <div class="d-inline-flex align-items-center border rounded bg-white overflow-hidden shadow-sm" style="height: 32px;">
                    <button onclick="changeQuantity(${index}, -1)" class="btn btn-link text-dark p-0 fw-bold text-decoration-none" style="width: 32px; line-height: 32px;">-</button>
                    
                    <input type="number" 
                           value="${itemQty}" 
                           min="1" 
                           class="form-control p-0 fw-semibold text-center border-0 text-dark" 
                           style="width: 45px; font-size: 14px; height: 100%; outline: none; box-shadow: none; -moz-appearance: textfield;"
                           onchange="changeQuantityFromInput(${index}, this.value)">
                    
                    <button onclick="changeQuantity(${index}, 1)" class="btn btn-link text-dark p-0 fw-bold text-decoration-none" style="width: 32px; line-height: 32px;">+</button>
                </div>
            </td>
            <td class="fw-bold text-wood text-nowrap">
                ${itemTotal.toLocaleString('vi-VN')}đ
            </td>
            <td class="text-center">
                <button onclick="removeFromCart(${index})" class="btn btn-sm btn-outline-danger border-0">✕</button>
            </td>
        `;
        cartItemsContainer.appendChild(row);
    });

    updateTotalPrice(); 
}

function updateTotalPrice() {
    const totalPriceContainer = document.getElementById("totalPrice");
    if (totalPriceContainer) {
        let total = cart.reduce((sum, item) => sum + (Number(item.price) * (parseInt(item.quantity) || 1)), 0);
        totalPriceContainer.innerText = total.toLocaleString('vi-VN');
    }
}

document.addEventListener("DOMContentLoaded", function () {
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

    updateCart();
    updateCartCount();

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


function changeQuantityFromInput(index, value) {
    if (!cart[index]) return;

    let newQty = parseInt(value);

    if (isNaN(newQty) || newQty < 1) {
        alert("Số lượng sản phẩm phải lớn hơn hoặc bằng 1!");
        updateCart(); 
        return;
    }

    cart[index].quantity = newQty;

    saveCart();
    updateCart();      
    updateCartCount(); 
}