<?php

session_start();

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

  <style>
    .search-filter-bar {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
      margin: 20px auto;
      width: 85%;
    }

    .search-filter-bar input,
    .search-filter-bar select {
      padding: 10px 15px;
      font-size: 16px;
      border: 2px solid var(--clr-orange);
      border-radius: 10px;
      outline: none;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s ease, border-color 0.3s ease;
    }

    .search-filter-bar input:focus,
    .search-filter-bar select:focus {
      border-color: var(--clr-accent);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .search-filter-bar input {
      flex: 2;
    }

    .search-filter-bar select {
      flex: 1;
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

    <!-- modal -->
    <div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <!-- info -->
            <div class="text-center mb-4">
              <img id="modalProductImage" src="" alt="Product Image" class="img-fluid rounded"
                style="width: 150px; height: auto;">
              <h5 class="product-title" id="modalProductName" class="mt-3 mb-1"></h5 class="product-title">
              <h6 id="modalProductPrice" class="text-muted"></h6>
              <p id="modalProductDescription" class="text-muted small"></p>
            </div>

            <!-- quant -->
            <div class="d-flex justify-content-center align-items-center">
              <button type="button" class="btn btn-outline add-to-cart-btn-secondary btn-sm quantity-btn" id="decreaseQuantity"
                style="width: 40px; height: 40px; font-size: 20px;">-</button>
              <span id="productQuantity" class="mx-3 fs-4">1</span>
              <button type="button" class="btn btn-outline add-to-cart-btn-secondary btn-sm quantity-btn" id="increaseQuantity"
                style="width: 40px; height: 40px; font-size: 20px;">+</button>
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center align-items-center">
            <button class="btn btn-secondary btn-outline add-to-cart-btn " data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary btn-outline add-to-cart-btn" id="confirmAddToCart">Add to Cart</button>
          </div>
        </div>
      </div>
    </div>

    <!-- product section -->
    <div class="col-md-8 offset-md-2 mx-auto text-center mt-2">
      <h2 class="heading to-animate">Products</h2>
      <p class="sub-heading to-animate">Find what you're looking for at Tail Treats!</p>
    </div>

    <div class="search-filter-bar">
      <input type="text" id="searchBar" placeholder="Search products..." class="form-control">
      <select id="filterDropdown" class="form-control">
        <option value="All">All Categories</option>
        <option value="Food">Food</option>
        <option value="Health">Health</option>
        <option value="Grooming">Grooming</option>
      </select>
    </div>

    <div class="newContainer">
      <div id="foodSec" class="item item-1">
        <div class="category">Food</div>
        <div class="image-holder">
          <img src="./images/products/foods/food1.png" alt="Product 1">
        </div>
        <h5 class="product-title">Moochie Adult Small Breed Chicken Liver Wet Dog Food <br> 85g (12 pouches)</h5 class="product-title">
        <p class="price">₱739</p>
        <button class="btn btn-primary btn-outline add-to-cart-btn"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-2">
        <div class="category">Food</div>
        <div class="image-holder">
          <img src="./images/products/foods/food2.png" alt="Product 2">
        </div>
        <h5 class="product-title">Scrumbles Complete Dry Adult and Senior Dog Food Salmon <br> 2kg</h5 class="product-title">
        <p class="price">₱979</p>
        <button class="btn btn-primary btn-outline add-to-cart-btn"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-3">
        <div class="category">Food</div>
        <div class="image-holder">
          <img src="./images/products/foods/food3.png" alt="Product 3">
        </div>
        <h5 class="product-title">Kit Cat Signature Salmon Dry Cat Food <br> 1.2kg</h5 class="product-title">
        <p class="price">₱669</p>
        <button class="btn btn-primary btn-outline add-to-cart-btn"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-4">
        <div class="category">Food</div>
        <div class="image-holder">
          <img src="./images/products/foods/food4.png" alt="Product 4">
        </div>
        <h5 class="product-title">Royal Canin Kitten Instinctive Wet Food 85g</h5 class="product-title">
        <p class="price">₱119</p>
        <button class="btn btn-primary btn-outline add-to-cart-btn"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-5">
        <div class="category">Food</div>
        <div class="image-holder">
          <img src="./images/products/foods/food5.png" alt="Product 5">
        </div>
        <h5 class="product-title">Pedigree Adult Beef Wet Dog Food <br> 1.15kg (2 cans)</h5 class="product-title">
        <p class="price">₱625</p>
        <button class="btn btn-primary btn-outline add-to-cart-btn"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-6">
        <div class="category">Food</div>
        <div class="image-holder">
          <img src="./images/products/foods/food6.png" alt="Product 6">
        </div>
        <h5 class="product-title">Goodest Meaty Mackerel Pate with Chunks Wet Cat Food 85g (12 pouches)</h5 class="product-title">
        <p class="price">₱469</p>
        <button class="btn btn-primary btn-outline add-to-cart-btn"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <!-- Health section -->
      <div id="healthSec" class="item item-1">
        <div class="category">Health</div>
        <div class="image-holder">
          <img src="./images/products/health/health1.png" alt="Product 1">
        </div>
        <h5 class="product-title">Dr Shiba Jolly Joints Dog Supplement Mini Tub</h5 class="product-title">
        <p class="price">₱259</p>
        <button class="btn btn-primary btn-outline add-to-cart-btn"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-2">
        <div class="category">Health</div>
        <div class="image-holder">
          <img src="./images/products/health/health2.png" alt="Product 2">
        </div>
        <h5 class="product-title">Nexgard One Tablet Chewable for Dogs</h5 class="product-title">
        <p class="price">₱899</p>
        <button class="btn btn-primary btn-outline add-to-cart-btn"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-3">
        <div class="category">Health</div>
        <div class="image-holder">
          <img src="./images/products/health/health3.png" alt="Product 3">
        </div>
        <h5 class="product-title">IAMS Proactive Immune Dog Supplement <br> 168g</h5 class="product-title">
        <p class="price">₱669</p>
        <button class="btn btn-primary btn-outline add-to-cart-btn"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-4">
        <div class="category">Health</div>
        <div class="image-holder">
          <img src="./images/products/health/health4.png" alt="Product 4">
        </div>
        <h5 class="product-title">Fresh Friends Mint Toothpaste <br> 90g (2pcs)</h5 class="product-title">
        <p class="price">₱429</p>
        <button class="btn btn-primary btn-outline add-to-cart-btn"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-5">
        <div class="category">Health</div>
        <div class="image-holder">
          <img src="./images/products/health/health5 class="product-title".png" alt="Product 5">
        </div>
        <h5 class="product-title">Dr Shiba Anti Flea & Tick Soap</h5 class="product-title">
        <p class="price">₱239</p>
        <button class="btn btn-primary btn-outline add-to-cart-btn"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-6">
        <div class="category">Health</div>
        <div class="image-holder">
          <img src="./images/products/health/health6.png" alt="Product 6">
        </div>
        <h5 class="product-title">VitaCat Calming Aid for Cats 60 Chews</h5 class="product-title">
        <p class="price">₱1229</p>
        <button class="btn btn-primary btn-outline add-to-cart-btn"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <!-- Grooming section -->
      <div id="groomSec" class="item item-1">
        <div class="category">Grooming</div>
        <div class="image-holder">
          <img src="./images/products/grooming/groom1.png" alt="Product 1">
        </div>
        <h5 class="product-title">Doggo Sharp Layering Scissor</h5 class="product-title">
        <p class="price">₱339</p>
        <button class="btn btn-primary btn-outline add-to-cart-btn"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-2">
        <div class="category">Grooming</div>
        <div class="image-holder">
          <img src="./images/products/grooming/groom2.png" alt="Product 2">
        </div>
        <h5 class="product-title">Bark2Basics Dog Cologne</h5 class="product-title">
        <p class="price">₱639</p>
        <button class="btn btn-primary btn-outline add-to-cart-btn"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-3">
        <div class="category">Grooming</div>
        <div class="image-holder">
          <img src="./images/products/grooming/groom3.png" alt="Product 3">
        </div>
        <h5 class="product-title">Doggo Bathing Brush</h5 class="product-title">
        <p class="price">₱329</p>
        <button class="btn btn-primary btn-outline add-to-cart-btn"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-4">
        <div class="category">Grooming</div>
        <div class="image-holder">
          <img src="./images/products/grooming/groom4.png" alt="Product 4">
        </div>
        <h5 class="product-title">Andis UltraEdge Clipper Blade <br> Size 10</h5 class="product-title">
        <p class="price">₱1459</p>
        <button class="btn btn-primary btn-outline add-to-cart-btn"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-5">
        <div class="category">Grooming</div>
        <div class="image-holder">
          <img src="./images/products/grooming/groom5.png" alt="Product 5">
        </div>
        <h5 class="product-title">Boshel Dog Toothbrush Set</h5 class="product-title">
        <p class="price">₱349</p>
        <button class="btn btn-primary btn-outline add-to-cart-btn"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-6">
        <div class="category">Grooming</div>
        <div class="image-holder">
          <img src="./images/products/grooming/groom6.png" alt="Product 6">
        </div>
        <h5 class="product-title">Doggo Pet Nail Scissor</h5 class="product-title">
        <p class="price">₱349</p>
        <button class="btn btn-primary btn-outline add-to-cart-btn"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <!-- Supplies section -->
      <div id="supplySec" class="item item-1">
        <div class="category">Supplies</div>
        <div class="image-holder">
          <img src="./images/products/supplies/supplies1.png" alt="Product 1">
        </div>
        <h5 class="product-title">Doggo Squeaky Ball</h5 class="product-title">
        <p class="price">₱119</p>
        <button class="btn btn-primary btn-outline add-to-cart-btn"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-2">
        <div class="category">Supplies</div>
        <div class="image-holder">
          <img src="./images/products/supplies/supplies2.png" alt="Product 2">
        </div>
        <h5 class="product-title">Doggo Strong Harness</h5 class="product-title">
        <p class="price">₱288</p>
        <button class="btn btn-primary btn-outline add-to-cart-btn"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-3">
        <div class="category">Supplies</div>
        <div class="image-holder">
          <img src="./images/products/supplies/supplies3.png" alt="Product 3">
        </div>
        <h5 class="product-title">Doggo Slow-Down Bowl</h5 class="product-title">
        <p class="price">₱348</p>
        <button class="btn btn-primary btn-outline add-to-cart-btn"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-4">
        <div class="category">Supplies</div>
        <div class="image-holder">
          <img src="./images/products/supplies/supplies4.png" alt="Product 4">
        </div>
        <h5 class="product-title">Pets at Home Clamshell Cat Bed Blue Spotty</h5 class="product-title">
        <p class="price">₱1099</p>
        <button class="btn btn-primary btn-outline add-to-cart-btn"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-5">
        <div class="category">Supplies</div>
        <div class="image-holder">
          <img src="./images/products/supplies/supplies5.png" alt="Product 5">
        </div>
        <h5 class="product-title">Squishmallows Original Gordon Shark Pet Bed Grey</h5 class="product-title">
        <p class="price">₱2199</p>
        <button class="btn btn-primary btn-outline add-to-cart-btn"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
          cart</button>
      </div>

      <div class="item item-6">
        <div class="category">Supplies</div>
        <div class="image-holder">
          <img src="./images/products/supplies/supplies6.png" alt="Product 6">
        </div>
        <h5 class="product-title">Approved Washable Male Wrap 1s Large</h5 class="product-title">
        <p class="price">₱329</p>
        <button class="btn btn-primary btn-outline add-to-cart-btn"><i class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to
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
  <script src="./js/search.js"></script>
  <script src="./js/jquery-3.7.1.min.js"></script>
  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="./js/carousel.js"></script>
  <script src="./js/addCart.js"></script>

</body>

</html>