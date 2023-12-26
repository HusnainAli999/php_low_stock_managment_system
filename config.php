<?php
$conn = new mysqli("localhost", "root", "", "low_stock_managment_database");

if (!$conn) {
    echo "Major Connection Failed" . mysqli_connect_error();
    exit;
}
