<?php
session_start();
include './system/dao/connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];
    $userId = $_SESSION['username'];

    //Retrieve product information from the inventory
    $productQuery = $conn->prepare("SELECT * FROM inventory WHERE id = ?");
    $productQuery->bind_param("i", $productId);
    $productQuery->execute();
    $productResult = $productQuery->get_result();

    if ($productResult->num_rows > 0) {
        $product = $productResult->fetch_assoc();
        $productPrice = $product['price'];
        $productName = $product['name'];
        $productImage = $product['image'];
        $totalPrice = $productPrice * $quantity;

        //Check if the product already exists in the cart
        $checkStmt = $conn->prepare("SELECT * FROM cart WHERE username = ? AND id = ?");
        $checkStmt->bind_param("si", $userId, $productId);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows > 0) {
            //Product already exists in the cart, update the quantity and total price
            $updateStmt = $conn->prepare("UPDATE cart SET quantity = quantity + ?, price = price + ? WHERE username = ? AND id = ?");
            $updateStmt->bind_param("idsi", $quantity, $totalPrice, $userId, $productId);
            $updateStmt->execute();

            if ($updateStmt->affected_rows > 0) {
              echo "<script>alert('Cart updated successfully!');
              window.location.href = './products.php';
              </script>";
            } else {
              echo "<script>alert('Cart was not updated!');
              window.location.href = './products.php';
              </script>";
            }
            $updateStmt->close();
        } else {
            //Product does not exist in the cart, insert a new record
            $insertStmt = $conn->prepare("INSERT INTO cart (username, id, name, quantity, price, image) VALUES (?, ?, ?, ?, ?, ?)");
            $insertStmt->bind_param("sisids", $userId, $productId, $productName, $quantity, $totalPrice, $productImage);

            if ($insertStmt->execute()) {
                echo "<script>alert('Product added to cart successfully!');
                window.location.href = './products.php';
                </script>";
                
            } else {
                echo "<script>alert('Product was not added to cart!');
                window.location.href = './products.php';
                </script>";          
            } 
        }
    }    
} 
?>