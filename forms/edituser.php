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
  include '../system/dao/connect.php';
  $id = $_SESSION["id"];
  //fetch info
  $query = mysqli_query($conn, "SELECT * FROM usertable where id='$id'");
  $row = mysqli_fetch_assoc($query);
  ?>

  <h1>User Information</h1>
  <div id="error"></div>
  <form id="signupformValidation" action="../system/dao/edit.php" method="post">
    <div class="container">
      <div class="row">
        <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />
      </div>

      <div class="row">
        <div class="col-md-6">
          <label for="username">Username:</label>

          <input type="text" id="username" name="username" placeholder="Enter Username"
            value="<?php echo $row['username']; ?>" />
          <span></span>


        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <label for="firstName">First name:</label>

          <input type="text" id="firstname" name="firstname" placeholder="Enter First Name"
            value="<?php echo $row['firstname']; ?>" />
          <span></span>


        </div>

      </div>
      <div class="row">
        <div class="col-md-6">
          <label for="middleName">Middle name (Optional):</label>

          <input type="text" id="middlename" name="middlename" placeholder="Enter Middle Name"
            value="<?php echo $row['middlename']; ?>" />
          <span></span>


        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <label for="lastName">Last name:</label>

          <input type="text" id="lastname" name="lastname" placeholder="Enter Last Name"
            value="<?php echo $row['lastname']; ?>" />
          <span></span>


        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <label for="address">Complete Address:</label>

          <input type="text" id="address" name="address" placeholder="Enter Address"
            value="<?php echo $row['address']; ?>" />
          <span></span>


        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <label for="mobile">Mobile no.:</label>

          <input type="text" id="mobile" name="mobilenumber" placeholder="Enter mobile number"
            value="<?php echo $row['mobilenumber']; ?>" />

          <span></span>


        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <label for="birthdate">Birthdate:</label>

          <input type="text" id="birthdate" name="birthday" placeholder="MM-DD-YYYY"
            value="<?php echo $row['birthday']; ?>" />
          <span></span>

        </div>
      </div>

      <input type="submit" value="Submit" name='insert' />
    </div>
  </form>
  <!-- scripts -->
  <script src="../js/jquery-3.7.1.min.js"></script>
  <script src="../js/editAccvalidation.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/jquery-ui.min.js"></script>
  <script src="../js/date.js"></script>



</body>

</html>