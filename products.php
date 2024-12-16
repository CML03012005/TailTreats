<?php

session_start();


if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
	
    header("Location: ./forms/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TailTreats - Products</title>


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
    rel="stylesheet">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <link href="./css/style.css" rel="stylesheet">
  <link href="./css/other.css" rel="stylesheet">
  <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <!-- sidebar -->
  <?php
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
            <a href='#' class='nav-link'>
              <i class='bx bxs-grid-alt nav-icon'></i>
              <span class='nav-item'>Dashboard</span>
            </a>
            <span class='tooltip'>Dashboard</span>
          </li>
          <li class='nav-item-wrapper'>
            <a href='#' class='nav-link'>
              <i class='bx bxs-user-account nav-icon'></i>
              <span class='nav-item'>Account</span>
            </a>
            <span class='tooltip'>Account</span>
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
            <a href='#' class='nav-link'>
              <i class='bx bxs-user-account nav-icon'></i>
              <span class='nav-item'>Account</span>
            </a>
            <span class='tooltip'>Account</span>
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
    } 
    else {
      echo"<div class='menu-toggle'>
      <a href='../forms/login.php'><i class=''>Log-in</i></a>
      </div>";
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

    <!-- product section -->
    <div class="col-md-8 offset-md-2 mx-auto text-center mt-2">
      <h2 class="heading to-animate">Products</h2>
      <p class="sub-heading to-animate">Find what you're looking for at Tail Treats!</p>
    </div>

    <div class="newContainer">
      <div id="foodSec" class="item item-1">
        <div class="category">Food</div>
        <div class="image-holder">
          <img src="./images/products/foods/food1.png" alt="Product 1">
        </div>
        <p>Moochie Adult Small Breed Chicken Liver Wet Dog Food <br> 85g (12 pouches)</p>
        <p class="price">₱739</p>
        <button class="btn btn-primary btn-outline"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-2">
        <div class="category">Food</div>
        <div class="image-holder">
          <img src="./images/products/foods/food2.png" alt="Product 2">
        </div>
        <p>Scrumbles Complete Dry Adult and Senior Dog Food Salmon <br> 2kg</p>
        <p class="price">₱979</p>
        <button class="btn btn-primary btn-outline"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-3">
        <div class="category">Food</div>
        <div class="image-holder">
          <img src="./images/products/foods/food3.png" alt="Product 3">
        </div>
        <p>Kit Cat Signature Salmon Dry Cat Food <br> 1.2kg</p>
        <p class="price">₱669</p>
        <button class="btn btn-primary btn-outline"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-4">
        <div class="category">Food</div>
        <div class="image-holder">
          <img src="./images/products/foods/food4.png" alt="Product 4">
        </div>
        <p>Royal Canin Kitten Instinctive Wet Food 85g</p>
        <p class="price">₱119</p>
        <button class="btn btn-primary btn-outline"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-5">
        <div class="category">Food</div>
        <div class="image-holder">
          <img src="./images/products/foods/food5.png" alt="Product 5">
        </div>
        <p>Pedigree Adult Beef Wet Dog Food <br> 1.15kg (2 cans)</p>
        <p class="price">₱625</p>
        <button class="btn btn-primary btn-outline"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-6">
        <div class="category">Food</div>
        <div class="image-holder">
          <img src="./images/products/foods/food6.png" alt="Product 6">
        </div>
        <p>Goodest Meaty Mackerel Pate with Chunks Wet Cat Food 85g (12 pouches)</p>
        <p class="price">₱469</p>
        <button class="btn btn-primary btn-outline"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <!-- Health section -->
      <div id="healthSec" class="item item-1">
        <div class="category">Health</div>
        <div class="image-holder">
          <img src="./images/products/health/health1.png" alt="Product 1">
        </div>
        <p>Dr Shiba Jolly Joints Dog Supplement Mini Tub</p>
        <p class="price">₱259</p>
        <button class="btn btn-primary btn-outline"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-2">
        <div class="category">Health</div>
        <div class="image-holder">
          <img src="./images/products/health/health2.png" alt="Product 2">
        </div>
        <p>Nexgard One Tablet Chewable for Dogs</p>
        <p class="price">₱899</p>
        <button class="btn btn-primary btn-outline"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-3">
        <div class="category">Health</div>
        <div class="image-holder">
          <img src="./images/products/health/health3.png" alt="Product 3">
        </div>
        <p>IAMS Proactive Immune Dog Supplement <br> 168g</p>
        <p class="price">₱669</p>
        <button class="btn btn-primary btn-outline"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-4">
        <div class="category">Health</div>
        <div class="image-holder">
          <img src="./images/products/health/health4.png" alt="Product 4">
        </div>
        <p>Fresh Friends Mint Toothpaste <br> 90g (2pcs)</p>
        <p class="price">₱429</p>
        <button class="btn btn-primary btn-outline"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-5">
        <div class="category">Health</div>
        <div class="image-holder">
          <img src="./images/products/health/health5.png" alt="Product 5">
        </div>
        <p>Dr Shiba Anti Flea & Tick Soap</p>
        <p class="price">₱239</p>
        <button class="btn btn-primary btn-outline"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-6">
        <div class="category">Health</div>
        <div class="image-holder">
          <img src="./images/products/health/health6.png" alt="Product 6">
        </div>
        <p>VitaCat Calming Aid for Cats 60 Chews</p>
        <p class="price">₱1229</p>
        <button class="btn btn-primary btn-outline"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <!-- Grooming section -->
      <div id="groomSec" class="item item-1">
        <div class="category">Grooming</div>
        <div class="image-holder">
          <img src="./images/products/grooming/groom1.png" alt="Product 1">
        </div>
        <p>Doggo Sharp Layering Scissor</p>
        <p class="price">₱339</p>
        <button class="btn btn-primary btn-outline"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-2">
        <div class="category">Grooming</div>
        <div class="image-holder">
          <img src="./images/products/grooming/groom2.png" alt="Product 2">
        </div>
        <p>Bark2Basics Dog Cologne</p>
        <p class="price">₱639</p>
        <button class="btn btn-primary btn-outline"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-3">
        <div class="category">Grooming</div>
        <div class="image-holder">
          <img src="./images/products/grooming/groom3.png" alt="Product 3">
        </div>
        <p>Doggo Bathing Brush</p>
        <p class="price">₱329</p>
        <button class="btn btn-primary btn-outline"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-4">
        <div class="category">Grooming</div>
        <div class="image-holder">
          <img src="./images/products/grooming/groom4.png" alt="Product 4">
        </div>
        <p>Andis UltraEdge Clipper Blade <br> Size 10</p>
        <p class="price">₱1459</p>
        <button class="btn btn-primary btn-outline"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-5">
        <div class="category">Grooming</div>
        <div class="image-holder">
          <img src="./images/products/grooming/groom5.png" alt="Product 5">
        </div>
        <p>Boshel Dog Toothbrush Set</p>
        <p class="price">₱349</p>
        <button class="btn btn-primary btn-outline"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-6">
        <div class="category">Grooming</div>
        <div class="image-holder">
          <img src="./images/products/grooming/groom6.png" alt="Product 6">
        </div>
        <p>Doggo Pet Nail Scissor</p>
        <p class="price">₱349</p>
        <button class="btn btn-primary btn-outline"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <!-- Supplies section -->
      <div id="supplySec" class="item item-1">
        <div class="category">Supplies</div>
        <div class="image-holder">
          <img src="./images/products/supplies/supplies1.png" alt="Product 1">
        </div>
        <p>Doggo Squeaky Ball</p>
        <p class="price">₱119</p>
        <button class="btn btn-primary btn-outline"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-2">
        <div class="category">Supplies</div>
        <div class="image-holder">
          <img src="./images/products/supplies/supplies2.png" alt="Product 2">
        </div>
        <p>Doggo Strong Harness</p>
        <p class="price">₱288</p>
        <button class="btn btn-primary btn-outline"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-3">
        <div class="category">Supplies</div>
        <div class="image-holder">
          <img src="./images/products/supplies/supplies3.png" alt="Product 3">
        </div>
        <p>Doggo Slow-Down Bowl</p>
        <p class="price">₱348</p>
        <button class="btn btn-primary btn-outline"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-4">
        <div class="category">Supplies</div>
        <div class="image-holder">
          <img src="./images/products/supplies/supplies4.png" alt="Product 4">
        </div>
        <p>Pets at Home Clamshell Cat Bed Blue Spotty</p>
        <p class="price">₱1099</p>
        <button class="btn btn-primary btn-outline"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-5">
        <div class="category">Supplies</div>
        <div class="image-holder">
          <img src="./images/products/supplies/supplies5.png" alt="Product 5">
        </div>
        <p>Squishmallows Original Gordon Shark Pet Bed Grey</p>
        <p class="price">₱2199</p>
        <button class="btn btn-primary btn-outline"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-6">
        <div class="category">Supplies</div>
        <div class="image-holder">
          <img src="./images/products/supplies/supplies6.png" alt="Product 6">
        </div>
        <p>Approved Washable Male Wrap 1s Large</p>
        <p class="price">₱329</p>
        <button class="btn btn-primary btn-outline"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
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
</body>

</html>