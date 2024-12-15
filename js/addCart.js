document.addEventListener("DOMContentLoaded", () => {
  const addToCartButtons = document.querySelectorAll(".add-to-cart-btn");
  const modal = new bootstrap.Modal(document.getElementById("addToCartModal"));
  const confirmAddToCartButton = document.getElementById("confirmAddToCart");
  const productQuantityDisplay = document.getElementById("productQuantity");
  const decreaseQuantityButton = document.getElementById("decreaseQuantity");
  const increaseQuantityButton = document.getElementById("increaseQuantity");
  const modalProductImage = document.getElementById("modalProductImage");
  const modalProductName = document.getElementById("modalProductName");
  const modalProductPrice = document.getElementById("modalProductPrice");
  const modalProductDescription = document.getElementById("modalProductDescription");

  let currentProduct = null;
  let quantity = 1;

  // Open modal when "Add to Cart" button is clicked
  addToCartButtons.forEach(button => {
    button.addEventListener("click", (e) => {
      const productCard = e.target.closest(".product-card");
      const productName = productCard.querySelector(".product-title").textContent;
      const productImageSrc = productCard.querySelector("img").src;
      const productPrice = productCard.querySelector(".product-price").textContent;

      // Add a placeholder description (you can modify this as needed)
      const productDescription = "Get " + productName + ".";

      // Update modal content
      modalProductName.textContent = productName;
      modalProductImage.src = productImageSrc;
      modalProductPrice.textContent = productPrice;
      modalProductDescription.textContent = productDescription;

      currentProduct = productName;
      quantity = 1; // Reset quantity
      productQuantityDisplay.textContent = quantity;

      // Show modal
      modal.show();
    });
  });

  // Increase quantity
  increaseQuantityButton.addEventListener("click", () => {
    quantity++;
    productQuantityDisplay.textContent = quantity;
  });

  // Decrease quantity
  decreaseQuantityButton.addEventListener("click", () => {
    if (quantity > 1) {
      quantity--;
      productQuantityDisplay.textContent = quantity;
    }
  });

  // Handle confirm add to cart
  confirmAddToCartButton.addEventListener("click", () => {
    if (currentProduct && quantity > 0) {
      alert(`${quantity} of ${currentProduct} added to your cart!`);

      // Redirect to cart or update cart logic (adjust URL as needed)
      window.location.href = "/cart";
    }
  });
});