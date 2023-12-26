<?php
include "config.php";
include "css.php";

$salesProductId = intval($_POST['sales_product_id']);

$selectPro = mysqli_prepare($conn, "SELECT product_id, quantity FROM products_table WHERE product_id = ?");
$selectPro->bind_param("i", $salesProductId);
$selectPro->execute();
$selectProResult = $selectPro->get_result();

$productData = mysqli_fetch_assoc($selectProResult);
$quantity = $productData ? $productData['quantity'] : null;

if ($quantity === null) {
    echo "<h1 class='alert_h1'> Product not found. </h1>";
    exit;
}

if ($quantity == 0) {
    echo "<h1 class='alert_h1'> Quantity is End For This Product </h1>";
    exit;
}

$updateQuantityValue = $quantity - 1;

$updateProQuantity = mysqli_prepare($conn, "UPDATE products_table SET quantity = ? WHERE product_id = ?");
$updateProQuantity->bind_param("ii", $updateQuantityValue, $salesProductId);

if ($updateProQuantity->execute()) {
    echo "<script> window.location.href='index.php'; </script>";
} else {
    echo "Failed To Sale This Product: " . mysqli_error($conn);
}
