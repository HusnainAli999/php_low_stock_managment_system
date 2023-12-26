<?php
include "config.php";
include "css.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_POST['brand_name']) && empty($_POST['product_type'])) {
        echo "<h1 class='alert_h1'> According To My Logic, Please Add Brand Name Or Product Type. </h1>";
        exit;
    }    

    $stmt = mysqli_prepare($conn, "INSERT INTO low_stock_products (brand, type, stock_limit) VALUES (?, ?, ?) ");
    $stmt->bind_param("ssi", $_POST['brand_name'], $_POST['product_type'], $_POST['products_limit']);
    if ($stmt->execute()) {
        echo "<h1 class='alert_h1'> Stock Limit Successfully Set. </h1>";
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST" id='low_stock_limits_form'>
        <div>
            <label>Product Brand Name</label><br>
            <input type="text" name="brand_name" placeholder="Enter Brand Name" required>
        </div>

        <div>
            <label>Product Type</label><br>
            <input type="text" name="product_type" placeholder="Enter Product Type" required>
        </div>

        <div>
            <label>Product Limit</label><br>
            <input type="number" name="products_limit" placeholder="Enter Product Limit" required>
        </div>

        <div>
            <input type="submit" value="Set limits">
        </div>
    </form>
</body>

</html>