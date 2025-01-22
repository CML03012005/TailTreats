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
    }

    .cart-container {
      display: grid;
      grid-template-columns: 1fr 400px;
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

    select, input[type="text"] {
      width: 100%;
      padding: 0.5rem;
      margin: 0.5rem 0;
      border: 1px solid #e5e7eb;
      border-radius: 0.25rem;
    }

    .btn {
      width: 100%;
      padding: 0.75rem;
      background: #111827;
      color: white;
      border: none;
      border-radius: 0.25rem;
      cursor: pointer;
    }

    @media (max-width: 1024px) {
      .cart-container {
        grid-template-columns: 1fr;
      }
      
      .cart-item {
        grid-template-columns: 100px 1fr;
        gap: 1rem;
      }
    }
  </style>
</head>

<body>

  <!-- sidebar -->
  <?php
  if (!isset($_SESSION["loggedin"])) {
    echo"
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
  } else if ($_SESSION["loggedin"] == true){
    $username = $_SESSION["username"];
    $role = $_SESSION["role"];
    
    if ($username != null && $role =='Admin'){
      echo"
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
            <a href='#' class='nav-link'>
              <i class='bx bxs-shopping-bag nav-icon'></i>
              <span class='nav-item'>Products</span>
            </a>
            <span class='tooltip'>Products</span>
          </li>
          <li class='nav-item-wrapper'>
            <a href='#' class='nav-link'>
              <i class='bx bxs-cart nav-icon'></i>
              <span class='nav-item'>Cart</span>
            </a>
            <span class='tooltip'>Cart</span>
          </li>
          <li class='nav-item-wrapper'>
            <a href='#' class='nav-link'>
              <i class='bx bx-body nav-icon'></i>
              <span class='nav-item'>Customers</span>
            </a>
            <span class='tooltip'>Customers</span>
          </li>
          <li class='nav-item-wrapper'>
            <a href='#' class='nav-link'>
              <i class='bx bx-location-plus nav-icon'></i>
              <span class='nav-item'>Shipping</span>
            </a>
            <span class='tooltip'>Shipping</span>
          </li>
          <li class='nav-item-wrapper'>
            <a href='#' class='nav-link'>
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
    } else if ($username != null && $role =='User'){
      echo"
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
            <a href='./addcart.php' class='nav-link'>
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
  <div class="card">
      <div class="cart-container">
        <div class="cart-items">
          <div class="cart-header">
            <h1>Shopping Cart</h1>
            <span>3 items</span>
          </div>

          <div class="cart-item">
            <div class="item-image"></div>
            <div>
              <p>Category</p>
              <h3>Name</h3>
            </div>
            <div>
              <input type="number" class="quantity-input" value="1" min="1">
            </div>
            <div>Price</div>
            <!-- remove button delete lang to -->
           <div>×</div> 
          </div>

          <a href="#" style="display: inline-block; margin-top: 2rem;">← Back to shop</a>
        </div>

        <div class="summary">
          <h2 style="margin-bottom: 2rem;">Summary</h2>
          
          <div class="summary-row">
            <span>Items 3</span>
            <span>€ 132.00</span>
          </div>

          <h3 style="margin: 1rem 0;">Shipping</h3>
          <select>
            <option>Standard-Delivery- €5.00</option>
            <option>Express-Delivery- €10.00</option>
          </select>

          <h3 style="margin: 1rem 0;">Give code</h3>
          <input type="text" placeholder="Enter your code">

          <div class="summary-row" style="margin-top: 2rem; font-weight: bold;">
            <span>Total price</span>
            <span>€ 137.00</span>
          </div>

          <button class="btn">Checkout</button>
        </div>
      </div>
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