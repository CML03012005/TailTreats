
  // Select all "Add to Cart" buttons
  const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');

  // Select modal elements
  const modalProductImage = document.getElementById('modalProductImage');
  const modalProductName = document.getElementById('modalProductName');
  const modalProductPrice = document.getElementById('modalProductPrice');
  const productQuantity = document.getElementById('productQuantity');
  const confirmAddToCart = document.getElementById('confirmAddToCart');

  // Initialize quantity
  let quantity = 1;

  // Add event listeners to each button
  addToCartButtons.forEach(button => {
    button.addEventListener('click', function() {
      // Get product details
      const productTitle = this.previousElementSibling.previousElementSibling.innerText;
      const productPrice = parseFloat(this.previousElementSibling.innerText.replace('₱', '').replace(',', ''));
      const productImage = this.parentElement.querySelector('img').src;

      // Update modal with product details
      modalProductName.innerText = productTitle;
      modalProductPrice.innerText = `₱${productPrice.toFixed(2)}`;
      modalProductImage.src = productImage;

      // Reset quantity
      quantity = 1;
      productQuantity.innerText = quantity;

      // Show modal
      const addToCartModal = new bootstrap.Modal(document.getElementById('addToCartModal'));
      addToCartModal.show();

      // Update total price on quantity change
      const updateTotalPrice = () => {
        const totalPrice = productPrice * quantity;
        modalProductPrice.innerText = `₱${totalPrice.toFixed(2)}`;
      };

      // Increase quantity
      document.getElementById('increaseQuantity').onclick = () => {
        quantity++;
        productQuantity.innerText = quantity;
        updateTotalPrice();
      };

      // Decrease quantity
      document.getElementById('decreaseQuantity').onclick = () => {
        if (quantity > 1) {
          quantity--;
          productQuantity.innerText = quantity;
          updateTotalPrice();
        }
      };

      // Confirm add to cart
      confirmAddToCart.onclick = () => {
        // Here you would send the data to your server
        const productId = this.dataset.productId; // Assuming you have a data attribute for product ID
        const totalPrice = productPrice * quantity;

        // Example AJAX request to add to cart
        $.ajax({
          url: 'addcart.php', // Your server-side script to handle the cart addition
          method: 'POST',
          data: {
            productId: productId,
            quantity: quantity,
            totalPrice: totalPrice
          },
          success: function(response) {
            // Success message
            alert(`${quantity} of ${productTitle} added to your cart!`);
            // Close modal
            addToCartModal.hide();
          },
          error: function() {
            // Handle error
            alert('There was an error adding the product to the cart.');
          }
        });
      };
    });
  });