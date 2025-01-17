<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js" integrity="sha256-1m4qVbsdcSU19tulVTbeQReg0BjZiW6yGffnlr/NJu4=" crossorigin="anonymous"></script>
</head>
<body>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		include 'connect.php';
		
        $id=$_POST['id'];
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $mobilenumber = $_POST['mobilenumber'];
        $birthday = $_POST['birthday'];
    
        // Update the database
        $updateQuery = mysqli_query($conn, "UPDATE usertable SET username ='$username', firstname = '$firstname', middlename = '$middlename' , lastname = '$lastname', address = '$address', birthday = '$birthday', mobilenumber = '$mobilenumber' WHERE id = '$id'");

		if ($updateQuery == true) {
        
            echo"<script>
            Swal.fire({
                background: '#2D142C',
                color: '#FFECD1',
                icon: 'success',
                title: 'Updated',
                text: 'You have updated your account successfully!'
            }).then(() => {
                window.location.href = '../../index.php';
            });
          </script>";
          exit;
            
        } else {
            
            echo "<script>
                Swal.fire({
                    background: '#2D142C',
                    color: '#FFECD1',
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to update account!'
                }).then(() => {
                    window.location.href = './edituser.php';
                });
            </script>";
            exit;
        }
		
	}

?>

</body>

</html>