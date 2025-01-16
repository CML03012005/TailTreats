<?php

session_start();
$_SESSION['id'] = $id; 


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TailTreats</title>


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
            "<a href="./forms/edituser.php?id=<?php echo $_SESSION['id']; ?>" class='nav-link'>"
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

    <!-- about -->
    <div id="col-about" data-section="about" style="margin-bottom: 5rem;">
      <div class="about-col2 about-bg to-animate-2" style="background-image: url(images/image1.png);"></div>
      <div class="about-col2 about-text">
        <h2 class="heading to-animate">About TailTreats</h2>
        <p class="to-animate">
          <span class="firstcharacter">W</span>elcome to TailTreats! We are a dedicated pet store committed to providing
          exceptional products and services for pets and their families. Founded with a deep love for animals,
          TailTreats is more than just a store—it’s a community where pet lovers can find everything they need to ensure
          their furry friends live happy, healthy lives.
        </p>
        <p class="to-animate">
          Our professional grooming services ensure that pets look and feel their best, delivered by experienced
          groomers who treat each animal with gentle care. We also work closely with local shelters to support pet
          adoption, helping animals find loving homes and providing new pet parents with the resources they need to
          succeed.
        </p>
        <p class="text-center to-animate">
          <a href="#" class="btn btn-primary btn-outline">Get in touch</a>
        </p>
      </div>
    </div>

    <!-- category Section -->
    <section class="container my-5">
      <div class="row text-center">

        <!-- Food -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
          <a href="products.php#foodSec" class="text-decoration-none">
            <div class="p-4 rounded category-box" style="background-color: var(--clr-orange); color: var(--clr-light);">
              <div class="mb-3">
                <img src="./images/categories/food.jpg" alt="Food Category" class="circle-img">
              </div>
              <h3>Food</h3>
              <p>Quality treats and meals for pets.</p>
            </div>
          </a>
        </div>

        <!-- Health -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
          <a href="products.php#healthSec" class="text-decoration-none">
            <div class="p-4 rounded category-box" style="background-color: var(--clr-accent); color: var(--clr-light);">
              <div class="mb-3">
                <img src="./images/categories/health.jpg" alt="Health Category" class="circle-img">
              </div>
              <h3>Health</h3>
              <p>Essential products for pet wellness.</p>
            </div>
          </a>
        </div>

        <!-- Grooming -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
          <a href="products.php#groomSec" class="text-decoration-none">
           <div class="p-4 rounded category-box" style="background-color: var(--clr-orange); color: var(--clr-light);">  
              <div class="mb-3">
                <img src="./images/categories/groom.jpg" alt="Grooming Category" class="circle-img">
              </div>
              <h3>Grooming</h3>
              <p>Keep your pets clean and stylish.</p>
            </div>
          </a>
        </div>

        <!-- Supplies -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
          <a href="products.php#supplySec" class="text-decoration-none">
            <div class="p-4 rounded category-box" style="background-color: var(--clr-accent); color: var(--clr-light);">
              <div class="mb-3">
                <img src="./images/categories/toys.jpg" alt="Supplies Category" class="circle-img">
              </div>
              <h3>Supplies</h3>
              <p>Everyday supplies for happy pets.</p>
            </div>
          </a>
        </div>

      </div>
    </section>


    <!-- slider -->
    <div class="slider" style="
      --width: 200px;
      --height:200px;
      --quantity: 8;
     ">
      <div class="list">
        <div class="items" style="--position: 1"><img src="./images/slides/1.png" alt="Product 1"></div>
        <div class="items" style="--position: 2"><img src="./images/slides/2.png" alt="Product 2"></div>
        <div class="items" style="--position: 3"><img src="./images/slides/3.png" alt="Product 3"></div>
        <div class="items" style="--position: 4"><img src="./images/slides/4.png" alt="Product 4"></div>
        <div class="items" style="--position: 5"><img src="./images/slides/5.png" alt="Product 5"></div>
        <div class="items" style="--position: 6"><img src="./images/slides/6.png" alt="Product 6"></div>
        <div class="items" style="--position: 7"><img src="./images/slides/7.png" alt="Product 7"></div>
        <div class="items" style="--position: 8"><img src="./images/slides/8.png" alt="Product 8"></div>
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
              <h5 id="modalProductName" class="mt-3 mb-1"></h5>
              <h6 id="modalProductPrice" class="text-muted"></h6>
              <p id="modalProductDescription" class="text-muted small"></p>
            </div>

            <!-- quant -->
            <div class="d-flex justify-content-center align-items-center">
              <button type="button" class="btn btn-outline-secondary btn-sm quantity-btn" id="decreaseQuantity"
                style="width: 40px; height: 40px; font-size: 20px;">-</button>
              <span id="productQuantity" class="mx-3 fs-4">1</span>
              <button type="button" class="btn btn-outline-secondary btn-sm quantity-btn" id="increaseQuantity"
                style="width: 40px; height: 40px; font-size: 20px;">+</button>
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center align-items-center">
            <button class="btn btn-secondary btn-outline " data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary btn-outline" id="confirmAddToCart">Add to Cart</button>
          </div>
        </div>
      </div>
    </div>



    <!-- carousel -->
    <section class="product-section" id="featured">
      <div class="container">
        <h2 class="section-title text-center">Recommended by us</h2>
        <div id="productSlider" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <!-- First Slide -->
            <div class="carousel-item active">
              <div class="row justify-content-center">
                <div class="col-md-4">
                  <div class="product-card">
                    <img src="./images/products/foods/food1.png" alt="Product 1" class="product-img">
                    <h5 class="product-title">Moochie Adult Small Breed Chicken Liver</h5>
                    <p class="product-price">₱739</p>
                    <button class="btn btn-primary btn-outline add-to-cart-btn" data-product="Product 1"><i
                        class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to cart</button>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="product-card">
                    <img src="./images/products/health/health2.png" alt="Premier Table Lamp" class="product-img">
                    <h5 class="product-title">Nexgard One Tablet Chewable for Dogs</h5>
                    <p class="product-price">₱899</p>
                    <button class="btn btn-primary btn-outline add-to-cart-btn" data-product="Product 2"><i
                        class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to cart</button>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="product-card">
                    <img src="./images/products/supplies/supplies1.png" alt="Modern Lamp L20" class="product-img">
                    <h5 class="product-title">Doggo Squeaky Ball</h5>
                    <p class="product-price">₱119</p>
                    <button class="btn btn-primary btn-outline add-to-cart-btn" data-product="Product 3"><i
                        class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to cart</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Second Slide -->
            <div class="carousel-item">
              <div class="row justify-content-center">
                <div class="col-md-4">
                  <div class="product-card">
                    <img src="./images/products/grooming/groom1.png" alt="Premier Stained Lamp" class="product-img">
                    <h5 class="product-title">Doggo Sharp Layering Scissor</h5>
                    <p class="product-price">₱339</p>
                    <button class="btn btn-primary btn-outline add-to-cart-btn" data-product="Product 4"><i
                        class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to cart</button>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="product-card">
                    <img src="./images/products/carriers/special3.png" alt="Ottoman 123" class="product-img">
                    <h5 class="product-title">Tail Treat bag</h5>
                    <p class="product-price">₱1099</p>
                    <button class="btn btn-primary btn-outline add-to-cart-btn" data-product="Product 5"><i
                        class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to cart</button>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="product-card">
                    <img src="./images/products/foods/treat6.png" alt="Ottoman 350" class="product-img">
                    <h5 class="product-title">Dreamis with cheese 60g</h5>
                    <p class="product-price">₱509</p>
                    <button class="btn btn-primary btn-outline add-to-cart-btn" data-product="Product 6"><i
                        class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to cart</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Carousel Controls -->
          <a class="carousel-control-prev" href="#productSlider1" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#productSlider1" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </a>
        </div>
      </div>
    </section>

    <!-- exclusive -->
    <section class="product-section">
      <div class="container">
        <h2 class="section-title text-center">Exclusive Products</h2>
        <div id="productSlider" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <!-- First Slide -->
            <div class="carousel-item active">
              <div class="row justify-content-center">
                <div class="col-md-4">
                  <div class="product-card">
                    <img src="./images/products/exclusives/exclusives1.png" alt="Product 1" class="product-img">
                    <h5 class="product-title">Moochie Adult Small Breed Chicken Liver</h5>
                    <p class="product-price">₱739</p>
                    <button class="btn btn-primary btn-outline add-to-cart-btn" data-product="Product 1"><i
                        class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to cart</button>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="product-card">
                    <img src="./images/products/exclusives/exclusives2.png" alt="Premier Table Lamp"
                      class="product-img">
                    <h5 class="product-title">Nexgard One Tablet Chewable for Dogs</h5>
                    <p class="product-price">₱899</p>
                    <button class="btn btn-primary btn-outline add-to-cart-btn" data-product="Product 2"><i
                        class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to cart</button>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="product-card">
                    <img src="./images/products/exclusives/exclusives3.png" alt="Modern Lamp L20" class="product-img">
                    <h5 class="product-title">Doggo Squeaky Ball</h5>
                    <p class="product-price">₱119</p>
                    <button class="btn btn-primary btn-outline add-to-cart-btn" data-product="Product 3"><i
                        class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to cart</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Second Slide -->
            <div class="carousel-item">
              <div class="row justify-content-center">
                <div class="col-md-4">
                  <div class="product-card">
                    <img src="./images/products/exclusives/exclusives4.png" alt="Premier Stained Lamp"
                      class="product-img">
                    <h5 class="product-title">Doggo Sharp Layering Scissor</h5>
                    <p class="product-price">₱339</p>
                    <button class="btn btn-primary btn-outline add-to-cart-btn" data-product="Product 4"><i
                        class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to cart</button>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="product-card">
                    <img src="./images/products/exclusives/exclusives5.png" alt="Ottoman 123" class="product-img">
                    <h5 class="product-title">Tail Treat bag</h5>
                    <p class="product-price">₱1099</p>
                    <button class="btn btn-primary btn-outline add-to-cart-btn" data-product="Product 5"><i
                        class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to cart</button>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="product-card">
                    <img src="./images/products/exclusives/exclusives6.png" alt="Ottoman 350" class="product-img">
                    <h5 class="product-title">Dreamis with cheese 60g</h5>
                    <p class="product-price">₱509</p>
                    <button class="btn btn-primary btn-outline add-to-cart-btn" data-product="Product 6"><i
                        class="bi bi-cart-fill" style="margin-right: 5px;"></i> Add to cart</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Carousel Controls -->
          <a class="carousel-control-prev" href="#productSlider2" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#productSlider2" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </a>
        </div>
      </div>
    </section>

    <!-- support -->
    <div id="support">
      <div class="row text-center d-flex justify-content-center align-items-center">
        <div class="col-md-8 col-md-offset-2">
          <h2 class="section-title text-center">Support Our Furry Friends</h2>
          <p class="sub-heading">Your donations help provide food, shelter, and medical care for pets in need.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="organization">
            <img src="images/donate/organization1.png" alt="Organization 1" class="organization-img">
            <div class="organization-overlay">
              <a href="https://donatetopaws.org.ph/" class="btn btn-primary btn-outline">Read more</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="organization">
            <img src="images/donate/organization4.png" alt="Organization 2" class="organization-img">
            <div class="organization-overlay">
              <a href="https://paws.org.ph/cruelty-neglect/" class="btn btn-primary btn-outline">Read more</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="organization">
            <img src="images/donate/organization3.png" alt="Organization 3" class="organization-img">
            <div class="organization-overlay">
              <a href="https://paws.org.ph/adopt/" class="btn btn-primary btn-outline">Read more</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
      <div class="footer-container">
        <div class="footer-section">
          <h4 class="footer-title">TailTreats</h4>
          <p class="footer-description">The best treats and products for your furry friends.</p>
        </div>

        <div class="footer-section">
          <h5 class="footer-subtitle">Quick Links</h5>
          <ul class="footer-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>

        <div class="footer-section">
          <h5 class="footer-subtitle">Follow Us</h5>
          <div class="social-links">
            <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-twitter"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-youtube"></i></a>
          </div>
        </div>

        <div class="footer-section">
          <h5 class="footer-subtitle">Contact Us</h5>
          <p class="footer-contact-info">Email: support@tailtreats.com</p>
          <p class="footer-contact-info">Phone: +123 456 789</p>
        </div>
      </div>

      <div class="footer-bottom">
        <p>&copy; 2024 TailTreats. All rights reserved.</p>
      </div>
    </footer>


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