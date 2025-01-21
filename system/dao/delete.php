<?php
require_once "../dao/connect.php";

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = intval($_GET["id"]);
    $query = "DELETE FROM usertable WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ../../forms/login.php");
        exit();
    } 

    $stmt->close();
} 
$conn->close();
?>
