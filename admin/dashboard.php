<?php

session_start();

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

  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/other.css" rel="stylesheet">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
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
          <img src='../images/user-profile.png' alt='profile' class='user-img'>
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
          <img src='../images/user-profile.png' alt='profile' class='user-img'>
          <div>
            <p class='bold'>$username</p>
            <p>$role</p>
          </div>
        </div>
        <ul class='nav-list'>
          <li class='nav-item-wrapper'>
            <a href='../admin/dashboard.php' class='nav-link'>
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
            <a href='../system/controllers/logout.php' class='nav-link'>
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
            <a href='../system/controllers/logout.php' class='nav-link'>
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

  <div class="main-content">
  <section style="margin: 50px 0;">
          <!-- Search Form -->
          <form class="d-flex" role="search" method="GET" action="">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
      </form>
    <div class="container">
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">First Name</th>
                <th scope="col">Middle Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Address</th>
                <th scope="col">Birthday</th>
                <th scope="col">Mobile no.</th>
                <th scope="col">Role</th>
              </tr>
            </thead>
            <tbody>
                <?php 
                    require_once "../system/dao/connect.php";
                    
                    // SQL query
                    $query = "SELECT * FROM usertable";

                    // search input
                    if (isset($_GET['search']) && !empty($_GET['search'])) {
                        $search_term = $conn->real_escape_string($_GET['search']);
                        $query = "SELECT * FROM usertable WHERE 
                            username LIKE '%$search_term' OR
                            firstname LIKE '%$search_term%' OR 
                            middlename LIKE '%$search_term%' OR 
                            lastname LIKE '%$search_term%' OR 
                            address LIKE '%$search_term%' OR
                            birthday LIKE '%$search_term%' OR
                            mobilenumber LIKE '%$search_term%' OR
                            role LIKE '%$search_term%'";
                    }

                    // Execute query and display results
                    if ($result = $conn->query($query)) {
                        while ($row = $result->fetch_assoc()) { 
                            $id = $row['id'];
                            $username = $row['username'];
                            $firstname = $row['firstname'];
                            $middlename = $row['middlename'];
                            $lastname = $row['lastname'];
                            $address = $row['address'];
                            $birthday = $row['birthday'];
                            $mobilenumber = $row['mobilenumber'];
                            $role = $row['role'];
                ?>
				
                <tr class="trow">
                    <td><?php echo $id; ?></td>
                    <td><?php echo $username; ?></td>
                    <td><?php echo $firstname; ?></td>
                    <td><?php echo $middlename; ?></td>
                    <td><?php echo $lastname; ?></td>
                    <td><?php echo $address; ?></td>
                    <td><?php echo $birthday; ?></td>
                    <td><?php echo $mobilenumber; ?></td>
                    <td><?php echo $role; ?></td>
                </tr>
                <?php
                        } 
                    } 
                ?>
            </tbody>
          </table>
    </div>
</section>
  </div>

  <script>
    const button = document.querySelector('#button');
    const sidebar = document.querySelector('.sidebar');

    button.onclick = function () {
      sidebar.classList.toggle('active');
    };
  </script>

  <script src="../js/jquery-3.7.1.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>