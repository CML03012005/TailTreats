<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		include 'connect.php';
		
		$username=$_POST['username'];
		$password=$_POST['password'];
		$hashed_password = hash('sha256', $password);
		$firstname=$_POST['firstname'];
		$middlename=$_POST['middlename'];
		$lastname=$_POST['lastname'];
		$address=$_POST['address'];
		$birthday=$_POST['birthday'];
		$number=$_POST['mobilenumber'];
	
		mysqli_query($conn, "INSERT INTO usertable(username, password, firstname, middlename, lastname, address, birthday, mobilenumber) 
		VALUES('$username','$hashed_password','$firstname','$middlename','$lastname','$address','$birthday','$number')");
		
		header("Location: ../../index.php");
		
	}

?>