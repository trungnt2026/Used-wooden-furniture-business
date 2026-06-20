// tìm SP
let searchInput = document.getElementById("searchInput");
let products = document.querySelectorAll(".product");

searchInput.addEventListener("keyup", function () {
  let keyword = searchInput.value.toLowerCase();

  products.forEach(function (product) {
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
  cart.push({ name: name, price: price });
  saveCart();
  updateCart();

  alert("Đã thêm " + name + " vào giỏ!");
}

function updateCart() {
  let cartItems = document.getElementById("cartItems");
  let cartCount = document.getElementById("cartCount");
  let totalPrice = document.getElementById("totalPrice");

  if (cartCount) {
    cartCount.innerText = cart.length;
  }

  if (cartItems) {
    cartItems.innerHTML = "";
    total = 0;

    if (cart.length === 0) {
      cartItems.innerHTML = "<li>Giỏ hàng trống.</li>";
    } else {
      cart.forEach(function (item, index) {
        total += item.price;
        cartItems.innerHTML += `<li>
        ${item.name} - ${item.price.toLocaleString()}đ
        <button onclick="removeItem(${index})">Xóa</button>      
      </li>`;
      });
    }
  }

  if (totalPrice) {
    totalPrice.innerText = total.toLocaleString();
  }
}

updateCart();

function removeItem(index) {
  cart.splice(index, 1);

  saveCart();
  updateCart();
}

function checkout() {
  if (cart.length === 0) {
    alert("Giỏ hàng trống!");
    return;
  }

  let payment = document.getElementById("paymentMethod").value;

  if (payment === "cod") {
    alert("Đặt hàng thành công - Thanh toán khi nhận hàng.");
  } else if (payment === "visa/master") {
    alert("Chuyển sang cổng thanh toán Visa/Master.");
  } else {
    alert("Chuyển sang thanh toán Momo.");
  }
  cart = [];
  saveCart();
  updateCart();
}

// Thay vì gọi updateCart() trực tiếp ở dưới cùng, hãy bọc nó lại
document.addEventListener("DOMContentLoaded", function () {
  // Chỉ gọi updateCart nếu các phần tử cần thiết tồn tại trên trang
  if (
    document.getElementById("cartItems") ||
    document.getElementById("cartCount")
  ) {
    updateCart();
  }
});
