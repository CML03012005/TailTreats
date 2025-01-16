<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Edit Account</title>

  <!-- CSS -->
  <link href="../css/jquery-ui.min.css" rel="stylesheet">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/regis.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
  <!-- cdn icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">




  <style>
    body {
      background-image: url(../images/bgregis.jpg);
    }
  </style>
</head>

<body>
<?php
require_once "../system/dao/connect.php";

// get id
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Use prepared statements to prevent SQL injection
    $query = $conn->prepare("SELECT * FROM usertable WHERE id = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } 
} else {
  echo "id missing";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $mobilenumber = $_POST['mobileNumber'];
    $birthday = $_POST['birthday'];

    // Validation for required fields
    if (empty($id) ||  empty($username) || empty($firstname) || empty($lastname) || empty($address) || empty($mobilenumber) || empty($birthday)) {
        echo "<script>
                Swal.fire({
                    background: '#2D142C',
                    color: '#FFECD1',
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Required fields must be filled out!'
                }).then(() => {
                    window.location = './edituser.php';
                });
              </script>";
        exit;
    }

    // Update the database
    $updateQuery = $conn->prepare("UPDATE usertable SET username = ?, firstname = ?, middlename = ?, lastname = ?, address = ?, mobilenumber = ?, birthday = ? WHERE id = ?");
    $updateQuery->bind_param("ssssssi", $username, $firstname, $middlename, $lastname, $address, $mobilenumber, $birthday, $id);

    if ($updateQuery->execute()) {
        echo "<script>
                Swal.fire({
                    background: '#2D142C',
                    color: '#FFECD1',
                    icon: 'success',
                    title: 'Updated',
                    text: 'You have updated your account successfully!'
                }).then(() => {
                    window.location = '../index.php';
                });
              </script>";
    } else {
        echo "<script>
                Swal.fire({
                    background: '#2D142C',
                    color: '#FFECD1',
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to update account!'
                }).then(() => {
                    window.location = './edituser.php';
                });
              </script>";
    }
}
?>
  <h1>User Information</h1>
  <div id="error"></div>
  <form id="signupformValidation" action="../system/dao/addaccount.php" method="post">
    <div class="container">
      <div class="row">
        <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />
      </div>

      <div class="row">
        <div class="col-md-6">
          <label for="username">Username:</label>
          <div class="input-group">
            <input type="text" id="username" name="username" placeholder="Enter Username" value="<?php echo $row['username']; ?>" />
            <span></span>
            <i class="bi bi-person"></i>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <label for="firstName">First name:</label>
          <div class="input-group">
            <input type="text" id="firstname" name="firstname" placeholder="Enter First Name" value="<?php echo $row['firstname']; ?>" />
            <span></span>
            <i class="bi bi-person-badge"></i>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-md-6">
          <label for="middleName">Middle name (Optional):</label>
          <div class="input-group">
            <input type="text" id="middlename" name="middlename" placeholder="Enter Middle Name" value="<?php echo $row['middlename']; ?>" />
            <span></span>
            <i class="bi bi-person-lines-fill"></i>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <label for="lastName">Last name:</label>
          <div class="input-group">
            <input type="text" id="lastname" name="lastname" placeholder="Enter Last Name" value="<?php echo $row['lastname']; ?>" />
            <span></span>
            <i class="bi bi-person-video"></i>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <label for="address">Complete Address:</label>
          <div class="input-group">
            <input type="text" id="address" name="address" placeholder="Enter Address" value="<?php echo $row['address']; ?>" />
            <span></span>
            <i class="bi bi-geo-alt-fill"></i>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <label for="mobile">Mobile no.:</label>
          <div class="input-group">
            <input type="text" id="mobile" name="mobilenumber" placeholder="Enter mobile number" value="<?php echo $row['mobilenumber']; ?>" />
            <i class="bi bi-telephone"></i>
            <span></span>
          </div>

        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <label for="birthdate">Birthdate:</label>
          <div class="input-group">
            <input type="text" id="birthdate" name="birthday" placeholder="MM-DD-YYYY" value="<?php echo $row['birthday']; ?>" />
            <span></span>
            <i class="bi bi-calendar"></i>
          </div>

        </div>
      </div>

      <input type="submit" value="Submit" name='insert' />
    </div>
  </form>
  <!-- scripts -->
  <script src="../js/jquery-3.7.1.min.js"></script>
  <script src="../js/createAccvalidation.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/jquery-ui.min.js"></script>
  <script src="../js/date.js"></script>



</body>

</html>