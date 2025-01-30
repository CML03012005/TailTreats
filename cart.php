<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TailTreats - Cart</title>


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
    rel="stylesheet">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <link href="./css/style.css" rel="stylesheet">
  <link href="./css/other.css" rel="stylesheet">
  <link href="./css/bootstrap.min.css" rel="stylesheet">

  <style>
    .card {
      background: white;
      border-radius: 1rem;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      margin-top: 0.5rem;
      height: auto;
    }

    .cart-item-container {
      padding: 1rem 0;
      border-bottom: 1px solid #e5e7eb;
      display: block; /* Change to block to stack items vertically */
    }

    .cart-items {
      padding: 2rem;
    }

    .cart-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
    }

    .cart-item {
      display: grid;
      grid-template-columns: 100px 1fr 120px 80px 40px;
      gap: 1rem;
      align-items: center;
      padding: 1rem 0;
      border-bottom: 1px solid #e5e7eb;
    }

    .item-image {
      width: 100px;
      height: 100px;
      background: #f3f4f6;
      border-radius: 0.5rem;
    }

    .quantity-input {
      width: 60px;
      text-align: center;
      border: 1px solid #e5e7eb;
      border-radius: 0.25rem;
      padding: 0.25rem;
    }

    .summary {
      background: #f9fafb;
      padding: 2rem;
    }

    .summary-row {
      display: flex;
      justify-content: space-between;
      margin: 1rem 0;
    }

    select,
    input[type="text"] {
      width: 100%;
      padding: 0.5rem;
      margin: 0.5rem 0;
      border: 1px solid #e5e7eb;
      border-radius: 0.25rem;
    }

    .btn {
      width: 100%;
      background: #111827;
      color: white;
      border: none;
      border-radius: 0.25rem;
      cursor: pointer;
    }

    .remove-btn {
      background: none;
      border: none;
      font-size: 1.5rem;
      color: #000;
      cursor: pointer;
      transition: color 0.2s;
      margin-left: 15px;
    }

    .cart-item-container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 1rem 0;
      border-bottom: 1px solid #e5e7eb;
    }

    .cart-item-details {
      display: flex;
      align-items: center;
      flex-grow: 1;
      gap: 1rem;
    }

    .cart-item-image {
      width: 80px;
      height: 80px;
      background: #f3f4f6;
      border-radius: 0.5rem;
    }

    .cart-item-name {
      font-weight: bold;
      font-size: 1.1rem;
    }

    .cart-item-price {
      font-weight: bold;
      margin-top: 10px;
      margin-right: 1rem;
      margin-right: 85px;
    }

    .cart-item-quantity {
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .quantity-btn {
      width: 30px;
      height: 30px;
      background: #f3f4f6;
      border: none;
      border-radius: 0.25rem;
      cursor: pointer;
    }
  </style>
</head>

<body>

  <!-- sidebar -->
  <?php
  if (!isset($_SESSION["loggedin"])) {
    echo "
    <div class='sidebar'>
        <div class='top'>
          <div class='logo-1'>
            <i style='color: white; margin-left: 10px;'></i>
            <span class='act' style='color: white;'></span>
          </div>
          <i id='button' class='bx bx-menu'></i>
        </div>
        <div class='user'>
          <img src='./images/user-profile.png' alt='profile' class='user-img'>
          <div>
            <p class='bold'>Guest</p>
            <p></p>
          </div>
        </div>
        <ul class='nav-list'>
          <li class='nav-item-wrapper'>
            <a href='./forms/login.php' class='nav-link'>
              <i class='bx bx-log-out nav-icon'></i>
              <span class='nav-item'>Log-in</span>
            </a>
            <span class='tooltip'>Log-in</span>
          </li>
        </ul>
      </div>";
  } else if ($_SESSION["loggedin"] == true) {
    $username = $_SESSION["username"];
    $role = $_SESSION["role"];

    if ($username != null && $role == 'Admin') {
      echo "
      <div class='sidebar'>
        <div class='top'>
          <div class='logo-1'>
            <i style='color: white; margin-left: 10px;'></i>
            <span class='act' style='color: white;'></span>
          </div>
          <i id='button' class='bx bx-menu'></i>
        </div>
        <div class='user'>
          <img src='./images/user-profile.png' alt='profile' class='user-img'>
          <div>
            <p class='bold'>$username</p>
            <p>$role</p>
          </div>
        </div>
        <ul class='nav-list'>
          <li class='nav-item-wrapper'>
            <a href='./admin/dashboard.php' class='nav-link'>
              <i class='bx bxs-grid-alt nav-icon'></i>
              <span class='nav-item'>Dashboard</span>
            </a>
            <span class='tooltip'>Dashboard</span>
          </li>
          <li class='nav-item-wrapper'>
            <a href='./admin/inventory.php' class='nav-link'>
              <i class='bx bxs-shopping-bag nav-icon'></i>
              <span class='nav-item'>Products</span>
            </a>
            <span class='tooltip'>Products</span>
          </li>
          <li class='nav-item-wrapper'>
            <a href='./cart.php' class='nav-link'>
              <i class='bx bxs-cart nav-icon'></i>
              <span class='nav-item'>Cart</span>
            </a>
            <span class='tooltip'>Cart</span>
          </li>
          <li class='nav-item-wrapper'>
            <a href='#' class='nav-link'>
              <i class='bx bx-location-plus nav-icon'></i>
              <span class='nav-item'>Shipping</span>
            </a>
            <span class='tooltip'>Shipping</span>
          </li>
          <li class='nav-item-wrapper'>
            <a href='./system/controllers/settings.php' class='nav-link'>
              <i class='bx bx-cog nav-icon'></i>
              <span class='nav-item'>Settings</span>
            </a>
            <span class='tooltip'>Settings</span>
          </li>
          <li class='nav-item-wrapper'>
            <a href='./system/controllers/logout.php' class='nav-link'>
              <i class='bx bx-log-out nav-icon'></i>
              <span class='nav-item'>Logout</span>
            </a>
            <span class='tooltip'>Logout</span>
          </li>
        </ul>
      </div>";
    } else if ($username != null && $role == 'User') {
      echo "
      <div class='sidebar'>
        <div class='top'>
          <div class='logo-1'>
            <i style='color: white; margin-left: 10px;'></i>
            <span class='act' style='color: white;'></span>
          </div>
          <i id='button' class='bx bx-menu'></i>
        </div>
        <div class='user'>
          <img src='./images/user-profile.png' alt='profile' class='user-img'>
          <div>
            <p class='bold'>$username</p>
            <p>$role</p>
          </div>
        </div>
        <ul class='nav-list'>
          <li class='nav-item-wrapper'> 
            <a href='./forms/edituser.php'class='nav-link'>
              <i class='bx bxs-user-account nav-icon'></i>
              <span class='nav-item'>Account</span>
            </a>
            <span class='tooltip'>Account</span>
          </li>
          <li class='nav-item-wrapper'>
            <a href='./cart.php' class='nav-link'>
              <i class='bx bxs-cart nav-icon'></i>
              <span class='nav-item'>Cart</span>
            </a>
            <span class='tooltip'>Cart</span>
          </li>
          <li class='nav-item-wrapper'>
            <a href='#' class='nav-link'>
              <i class='bx bx-location-plus nav-icon'></i>
              <span class='nav-item'>Shipping</span>
            </a>
            <span class='tooltip'>Shipping</span>
          </li>
          <li class='nav-item-wrapper'>
            <a href='./system/controllers/settings.php' class='nav-link'>
              <i class='bx bx-cog nav-icon'></i>
              <span class='nav-item'>Settings</span>
            </a>
            <span class='tooltip'>Settings</span>
          </li>
          <li class='nav-item-wrapper'>
            <a href='./system/controllers/logout.php' class='nav-link'>
              <i class='bx bx-log-out nav-icon'></i>
              <span class='nav-item'>Logout</span>
            </a>
            <span class='tooltip'>Logout</span>
          </li>
        </ul>
      </div>";
    }
  }
  ?>


  <!-- main -->
  <div class="main-content">
    <div class="navBar">
      <div class="menu-1">
        <a href="index.php">Home</a>
        <a href="index.php#featured">Featured</a>
      </div>
      <div class="logo-2">
        <a href="">TailTreats</a>
      </div>
      <div class="menu-2">
        <a href="products.php">Products</a>
        <a href="index.php#support">Support</a>
      </div>
    </div>

    <?php
    include './system/dao/connect.php';

    $username = $_SESSION["username"];

    $select_products = mysqli_query($conn, "SELECT * FROM `cart` where username = '$username'");
    $cart_items = [];
    $total_price = 0;

    if (isset($_POST['remove_item_id'])) {
      $item_id = $_POST['remove_item_id'];
      $username = $_SESSION['username'];
  
      // Prepare the SQL statement to prevent SQL injection
      $stmt = $conn->prepare("DELETE FROM `cart` WHERE `id` = ? AND `username` = ?");
      $stmt->bind_param("is", $item_id, $username);
  
      if ($stmt->execute()) {
          // Item removed successfully
          echo "<script>alert('Item was removed!');
              window.location.href = './cart.php';
          </script>";
      } else {
          // Error occurred
          echo "<script>alert('Item was not removed!');
              window.location.href = './cart.php';
          </script>";
      }
    }

    if (isset($_POST['checkout'])) {
    $username = $_SESSION['username'];
    
    // Fetch cart items
    $select_products = mysqli_query($conn, "SELECT * FROM `cart` WHERE username = '$username'");
    
    if (mysqli_num_rows($select_products) > 0) {
        while ($fetch_prod = mysqli_fetch_assoc($select_products)) {
            $item_id = $fetch_prod['id'];
            $quantity = $fetch_prod['quantity'];

            // Update inventory
            $stmt = $conn->prepare("UPDATE `inventory` SET `quantity` = `quantity` - ? WHERE `id` = ?");
            $stmt->bind_param("ii", $quantity, $item_id);
            $stmt->execute();
            $stmt->close();
        }

        // Clear the cart after successful checkout
        $stmt = $conn->prepare("DELETE FROM `cart` WHERE `username` = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->close();

        // Success message
        echo "<script>alert('Checkout successful! Thank you for purchasing!');
              window.location.href = './cart.php';
          </script>";
    } else {
      echo "<script>alert('Checkout unsuccessful! Please try again.');
              window.location.href = './cart.php';
          </script>";
    }
  }
    if (mysqli_num_rows($select_products) > 0) {
      while ($fetch_prod = mysqli_fetch_assoc($select_products)) {
        $cart_items[] = $fetch_prod;
        $total_price += $fetch_prod['price']; // Calculate total price
      }
    ?>
        <form method="post" action="">
          <div class="card">
            <div class="cart-container">
              <div class="cart-items">
                <div class="cart-header">
                  <h1>Shopping Cart</h1>
                  <span><?php echo count($cart_items); ?> products</span>
                </div>
                <table>
                    <tr>
                    </tr>
                </table>
                <?php foreach ($cart_items as $item): ?>
                <div class="cart-item-container">
                    <div class="cart-item-details">
                    <img src="./images/database/<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" class="product-img cart-item-image">
                    <h5 class="product-title cart-item-name"><?php echo $item['name']; ?></h5>
                    </div>
                    <p class="cart-item-price">₱<?php echo number_format($item['price'], 2); ?></p>
                    <div class="cart-item-quantity">
                    <input type="text" class="quantity-input" value="<?php echo $item['quantity']; ?>" readonly>
                    </div>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="remove_item_id" value="<?php echo $item['id']; ?>">
                        <button class="remove-btn" type="submit">×</button>
                    </form> 
                </div>
                <?php endforeach; ?>
              </div>
        </form>
        <?php

    } else {
      echo "No items added to cart";
    }
    ?>



    <div class="summary">
        <h2>Summary</h2>
          <div class="summary-row">
            <span>Subtotal</span>
            <span>₱<?php echo number_format($total_price, 2); ?></span>
          </div>
          <div class="summary-row">
            <span>Shipping</span>
            <span>₱0</span>
          </div>
          <div class="summary-row">
            <span>Total</span>
            <span>₱<?php echo number_format($total_price, 2); ?></span>
          </div>
          <form method="post">
            <button class="btn" type="submit" name="checkout">Proceed to Checkout</button>
          </form>
  </div>
  </div>

  <script>
    const button = document.querySelector('#button');
    const sidebar = document.querySelector('.sidebar');

    button.onclick = function () {
      sidebar.classList.toggle('active');
    };
  </script>

  <script src="./js/jquery-3.7.1.min.js"></script>
  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="./js/carousel.js"></script>
  <script src="./js/addCart.js"></script>

</body>

</html>