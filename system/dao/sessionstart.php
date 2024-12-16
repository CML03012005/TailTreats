<!DOCTYPE html>

<?php

	if(isset($_POST['insert'])){
		include 'connect.php';
		
		$username=$_POST['username'];
		$password=$_POST['password'];
		$role=$_POST['role'];

		if($username == null || $password == null){
			
			echo"<script>alert('Please fill in all required details!');
			window.location.href='../../forms/login.php';
			</script>";
			exit;
		} else{
			
			$query = mysqli_query($conn, "SELECT * FROM usertable where username='$username' and password = '$password'"); 
			

			if(mysqli_num_rows($query)==0){
				echo"<script>alert('Invalid Credentials!');
				window.location.href='../../forms/login.php';
				</script>";
				exit;
			}else{
				$test = mysqli_fetch_assoc($query);

				$validUsername = $test['username'];
				$validPassword = $test['password'];
				$role = $test['role'];

				if ($username === $validUsername && $password === $validPassword) {
			
					session_start();
				   
					$_SESSION["loggedin"] = true;
					$_SESSION["username"] = $username;
					$_SESSION["role"]= $role;

					if($role == "Admin"){
						echo"<script>alert('Admin Log-in Success!');
						window.location.href='../../index.php';
						</script>";
						exit;
					}else{
						echo"<script>alert('User Log-in Success!');
						window.location.href='../../index.php';
						</script>";
						exit;
					}
					
					
					
				} 
			}
		}
	}
?>