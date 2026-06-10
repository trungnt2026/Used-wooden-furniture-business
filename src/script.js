let searchInput = document.getElementById('searchInput');
let products = document.querySelectorAll('.product');

searchInput.addEventListener("keyup", function() {
    let keyword = searchInput.value.toLowerCase();

    products.forEach(function(product) {
        let name = product.getAttribute("data-name");

        if (name.includes(keyword)) {
            product.style.display = "block";

        }else {
            product.style.display = "none";
        }

    });
});
