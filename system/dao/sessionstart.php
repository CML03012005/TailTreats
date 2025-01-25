<?php
session_start();
include 'connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['insert'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "<script>alert('Please fill in all required details!');
        window.location.href='../../forms/login.php';</script>";
        exit;
    }

    // Fetch user data
    $query = mysqli_query($conn, "SELECT * FROM usertable WHERE username='$username'");
    $fetch = mysqli_fetch_assoc($query);

    if (!$fetch) {
        echo "<script>alert('Invalid Credentials!');
        window.location.href='../../forms/login.php';</script>";
        exit;
    }

    if ($fetch['accountlocked'] == 1) {
        $lock_time = strtotime($fetch['locktime']);
        $current_time = time();
        $remaining_time = ($lock_time + 60) - $current_time; 

        if ($remaining_time > 0) {
            echo "<script>alert('Your account will be unlocked in $remaining_time seconds.');
            window.location.href='../../forms/login.php';</script>";
            exit;
        } else {
            mysqli_query($conn, "UPDATE usertable SET accountlocked = 0, locktime = NULL, failedattempts = 0 WHERE username='$username'");
        }
    }

    $hashed_password = hash('sha256', $password); 
    $query_3 = mysqli_query($conn, "SELECT * FROM usertable WHERE username='$username' AND password='$hashed_password'");

    if (mysqli_num_rows($query_3) != 0) {
        $test = mysqli_fetch_assoc($query_3);
        $role = $test['role'];

        mysqli_query($conn, "UPDATE usertable SET failedattempts = 0, locktime = NULL, accountlocked = 0 WHERE username='$username'");

        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        $_SESSION["id"] = $test['id'];
        $_SESSION["role"] = $role;

        if ($role == "Admin") {
            echo "<script>alert('Admin Log-in Success!');
            window.location.href='../../index.php';</script>";
        } else {
            echo "<script>alert('User Log-in Success!');
            window.location.href='../../index.php';</script>";
        }
        exit;
    } else {
        $failed_attempts = $fetch['failedattempts'] + 1;

        if ($failed_attempts >= 3) {
            mysqli_query($conn, "UPDATE usertable SET accountlocked = 1, locktime = NOW(), failedattempts = 3 WHERE username='$username'");
            echo "<script>alert('Your account is locked! Try again after 1 minute.');
            window.location.href='../../forms/login.php';</script>";
            exit;
        } else {
            mysqli_query($conn, "UPDATE usertable SET failedattempts = $failed_attempts WHERE username='$username'");
            echo "<script>alert('Incorrect password! You have " . (3 - $failed_attempts) . " attempts left.');
            window.location.href='../../forms/login.php';</script>";
            exit;
        }
    }
}
?>
