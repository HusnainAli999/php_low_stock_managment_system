<?php
include "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = mysqli_prepare($conn, "UPDATE products_table SET quantity = quantity + ? WHERE product_id = ?");
    $stmt->bind_param("ii", $_POST['quantity_value'], $_POST['add_quantity_product_id']);
    if ($stmt->execute()) {
        echo "<script> window.location.href='index.php'; </script>";
    } else {
        echo "Failed To Update Quantity";
        exit;
    }
}
