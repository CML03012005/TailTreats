

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
        
            echo"<script>alert('You have updated your account successfully!');
            window.location.href='../../index.php';
            </script>";
            
        } else {
            echo "<script>
                alert('Failed to update account!')    
                window.location.href = '../../forms/edituser.php';
            </script>";
        }
		
	}

?>