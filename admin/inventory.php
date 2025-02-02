<?php

session_start();

?>

<?php
include '../system/dao/connect.php';

if (isset($_POST['add_product'])) {
  $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
  $product_quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
  $product_price = mysqli_real_escape_string($conn, $_POST['price']);

  $product_image = $_FILES['product_image']['name'];
  $product_image_temp_name = $_FILES['product_image']['tmp_name'];
  $product_image_folder = '../images/database/' . $product_image;

  if (!empty($product_image)) {
    // move image to folder
    if (move_uploaded_file($product_image_temp_name, $product_image_folder)) {
      // query insert image
      $query = mysqli_query($conn, "INSERT INTO `inventory` (name, quantity, price, image) 
                VALUES ('$product_name', '$product_quantity', '$product_price', '$product_image')");
    }
  }
}

else if (isset($_POST['edit_product'])) {
  $product_name = $_POST['name'];
  $product_quantity = $_POST['quantity'];
  $product_price = $_POST['price'];
  $product_id = $_POST['id'];
  
  $product_image = $_FILES['image']['name'];
  $product_image_temp_name = $_FILES['image']['tmp_name'];
  $product_image_folder = '../images/database/' . $product_image;

  if (!empty($product_image)) {
    // move image to folder
    if (move_uploaded_file($product_image_temp_name, $product_image_folder)) {
      // query insert image
      $query =mysqli_query($conn, "UPDATE inventory set name ='$product_name', quantity = '$product_quantity', 
      price ='$product_price', image ='$product_image' where id=$product_id");
    }
  }else {
      echo"<script>alert('Please fill in all required details!');</script>";
      
  }
}

else if (isset($_POST['delete_product'])) {
  $product_id = $_POST['id'];
  
  mysqli_query($conn, "DELETE FROM inventory WHERE id = '$product_id'"); 
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TailTreats - Inventory</title>


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
    rel="stylesheet">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/other.css" rel="stylesheet">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/inv.css" rel="stylesheet">

  <style>

    #inventoryTable img{
    max-width: 30%;
  }
  
  </style>
  
</head>
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
            <a href='./dashboard.php' class='nav-link'>
              <i class='bx bxs-grid-alt nav-icon'></i>
              <span class='nav-item'>Dashboard</span>
            </a>
            <span class='tooltip'>Dashboard</span>
          </li>
          <li class='nav-item-wrapper'>
            <a href='./inventory.php' class='nav-link'>
              <i class='bx bxs-shopping-bag nav-icon'></i>
              <span class='nav-item'>Products</span>
            </a>
            <span class='tooltip'>Products</span>
          </li>
          <li class='nav-item-wrapper'>
            <a href='../cart.php' class='nav-link'>
              <i class='bx bxs-cart nav-icon'></i>
              <span class='nav-item'>Cart</span>
            </a>
            <span class='tooltip'>Cart</span>
          </li>
          <li class='nav-item-wrapper'>
            <a href='../system/controllers/settings.php' class='nav-link'>
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
  <div class="container-fluid">
    <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-md-4 pt-4">
      <div id="row" class="card mb-3">
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-md-4 text-left mb-3">
              <h1>Inventory Management</h1>
            </div>
          </div>
          <hr />
          <form method="get" action="">
            <div class="form-row mb-4">
              <div class="form-group col-md-4">
                <input type="text" name="search" id="searchInput" class="form-control" placeholder="Search">
              </div>
            </div>
          </form>
          <table class="table table-sm" id="inventoryTable">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th style="text-align: center;" scope="col">Image</th>
                <th style="text-align: center;" scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $display = "select * from `inventory`";
              
              if (isset($_GET['search']) && !empty($_GET['search'])) {
                $search_term = $conn->real_escape_string($_GET['search']);
                $display = "SELECT * FROM inventory WHERE 
                              name LIKE '%$search_term%'";
              }

              if ($result = $conn->query($display)) {
                while ($row = $result->fetch_assoc()) {
                  $product_name = $row['name'];
                  $product_quantity = $row['quantity'];
                  $product_price = $row['price'];
                  $product_image = $row['image'];
                  $id = $row['id'];
                  ?>

                  <!-- display table -->
                  <tr>
                    <td><?php echo $product_name ?></td>
                    <td><?php echo $product_quantity ?></td>
                    <td>₱<?php echo $product_price ?></td>
                    <td><div class="d-flex justify-content-center align-items-center"><img src="../images/database/<?php echo $product_image ?>"></div></td>
                    <td>
                    <button type="button" class="btn btn-primary btn-sm edit-btn"
                        style="padding-right: 60px; margin-right:10px"
                        data-bs-toggle="modal"
                        data-bs-target="#editProductModal"
                        data-id="<?php echo $id; ?>"
                        data-name="<?php echo $product_name; ?>"
                        data-quantity="<?php echo $product_quantity; ?>"
                        data-price="<?php echo $product_price; ?>"
                        data-image="<?php echo $product_image; ?>">
                        Edit
                    </button>
                    </td>
                  </tr>
                  <?php
                }
              }
              ?>

            </tbody>
          </table>

          <!-- actions -->
          <div class="form-row">
            <div class="form-group col-md-4 text-left mb-3">
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                data-bs-target="#addProductModal">
                Add
              </button>
            </div>
            <div class="form-group col-md-4 text-left mb-3">
              <a href="../index.php" class="btn btn-primary btn-sm">Back</a>
            </div>
          </div>

          <!-- modal for add -->
          <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="#" enctype="multipart/form-data">
                  <div class="modal-body">
                    <!-- Product Name -->
                    <div class="mb-3">
                      <label for="productName" class="form-label">Product Name</label>
                      <input type="text" class="form-control" id="productName" name="product_name" required>
                    </div>
                    <!-- Quantity -->
                    <div class="mb-3">
                      <label for="quantity" class="form-label">Quantity</label>
                      <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                    </div>
                    <!-- Price -->
                    <div class="mb-3">
                      <label for="price" class="form-label">Price</label>
                      <input type="text" class="form-control" id="price" name="price" min="0" step="0.01" required>
                    </div>
                    <!-- Product Image -->
                    <div class="mb-3">
                      <label for="productImage" class="form-label">Product Image</label>
                      <input type="file" class="form-control" id="productImage" name="product_image"
                        accept="image/png, image/jpg" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="add_product">Add</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- modal for edit -->
          <?php
              $edit = mysqli_query($conn, "select * from inventory where id = '$id'");
              if (mysqli_num_rows($edit) > 0) {
                while ($prod = mysqli_fetch_assoc($edit)) {
                  $name = $prod['name'];
                  $quantity = $prod['quantity'];
                  $price = $prod['price'];
                  $image = $prod['image'];
                }
              }
          ?>
          <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="addProductModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addProductModalLabel">Edit Product</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="#" enctype="multipart/form-data">
                  <div class="modal-body">
                    <!-- Product Name -->
                    <div class="mb-3">
                      <label for="id" class="id"></label>
                      <input type="hidden" class="form-control" id="id" name="id" required value="<?php echo"$id"?>">
                    </div>
                    <div class="mb-3">
                      <label for="productName" class="form-label">Product Name</label>
                      <input type="text" class="form-control" id="productName" name="name" required value="<?php echo $name ?>">
                    </div>
                    <!-- Quantity -->
                    <div class="mb-3">
                      <label for="quantity" class="form-label">Quantity</label>
                      <input type="number" class="form-control" id="quantity" name="quantity" min="1" required value="<?php echo $quantity ?>">
                    </div>
                    <!-- Price -->
                    <div class="mb-3">
                      <label for="price" class="form-label">Price</label>
                      <input type="text" class="form-control" id="price" name="price" min="0" step="0.01" required value="<?php echo $price ?>">
                    </div>
                    <!-- Product Image -->
                    <div class="mb-3">
                    <label for="productImage" class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="productImage" name="image" accept="image/png, image/jpg">
  
                    <!-- Show the currently uploaded image -->
                    <div class="mt-2">
                      <p>Current Image:</p>
                      <img id="editProductImagePreview" src="../images/database/<?php echo $image; ?>" alt="Product Image" style="width: 100px; height: auto;">
                    </div>
                  </div>
                  <div class="modal-footer justify-content-center">
                    <button style="width: 30%;" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button style="width: 30%;" type="submit" class="btn btn-primary" name="edit_product">Confirm</button>
                    <button style="width: 30%;" type="submit" class="btn btn-primary" name="delete_product">Delete</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </main>
  </div>

</div>

<script>
  const button = document.querySelector('#button');
  const sidebar = document.querySelector('.sidebar');

  button.onclick = function () {
    sidebar.classList.toggle('active');
  };
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".edit-btn").forEach(button => {
    button.addEventListener("click", function () {
      let id = this.getAttribute("data-id");
      let name = this.getAttribute("data-name");
      let quantity = this.getAttribute("data-quantity");
      let price = this.getAttribute("data-price");
      let image = this.getAttribute("data-image");

      // Set values in the modal form
      document.querySelector("#editProductModal input[name='id']").value = id;
      document.querySelector("#editProductModal input[name='name']").value = name;
      document.querySelector("#editProductModal input[name='quantity']").value = quantity;
      document.querySelector("#editProductModal input[name='price']").value = price;

      // Update image preview
      let imageElement = document.querySelector("#editProductModal img#editProductImagePreview");
      if (imageElement) {
        imageElement.src = "../images/database/" + image;
      }
    });
  });

  // Update the image preview when a new file is selected
  document.querySelector("#productImage").addEventListener("change", function (event) {
    let imageElement = document.querySelector("#editProductImagePreview");
    if (imageElement && event.target.files.length > 0) {
      let reader = new FileReader();
      reader.onload = function (e) {
        imageElement.src = e.target.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    }
  });
});
</script>

<script src="../js/jquery-3.7.1.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/carousel.js"></script>
<script src="../js/addCart.js"></script>

</body>

</html>