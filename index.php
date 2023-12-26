<?php
include "config.php";
include "css.php";

$lowStockProducts = mysqli_prepare($conn, "SELECT DISTINCT products_table.*, low_stock_products.* FROM products_table
INNER JOIN low_stock_products ON
products_table.brand = low_stock_products.brand AND products_table.type = low_stock_products.type 
WHERE products_table.quantity <= low_stock_products.stock_limit");

$lowStockProducts->execute();
$lowStockResults = $lowStockProducts->get_result();

$totalLowStockPro = mysqli_num_rows($lowStockResults);

echo "<h1 class='top_h1'>Index  <a href='set_products_stock_limits.php'> Set Limits For Products </a> <a href='fetch_stock_limits.php'> Stock Limits </a></h1>";

echo "<i class='fa-solid fa-bell'></i> <span class='low_stock_pro_count_span'> (" . $totalLowStockPro . ") </span>";
echo "<div class='show_low_stock_products_main_div'>
   <p class='s_f_p'>Low Stock Products</p>";


while ($lowLoop = mysqli_fetch_assoc($lowStockResults)) {
    $modifiedTitle = (strlen($lowLoop['title'] > 20) ? substr($lowLoop['title'], 0, 20) . '...' : $lowLoop['title']);
    echo "
    <a href='index.php?product_id=" . $lowLoop['product_id'] . "'>
    <div class='low_stock_inner_product_div'>
    <p> Id : " . $lowLoop['product_id'] . " </p>
    <p> Title : " . $modifiedTitle . " </p>
        <p> Brand : " . (!empty($lowLoop['brand']) ? $lowLoop['brand'] : 'Nill') . " </p>
        <p> Type : " . (!empty($lowLoop['type']) ? $lowLoop['type'] : 'Null') . " </p>
        <p> Stock Limit : " . $lowLoop['stock_limit'] . " (Available Q : " . $lowLoop['quantity'] . " )</p>
     </div> </a>";
}


echo "</div>";

if (isset($_GET['product_id'])) {
    $stmt = mysqli_prepare($conn, "SELECT * FROM products_table WHERE product_id = ?");
    $stmt->bind_param("i", $_GET['product_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<button onclick='goBack()' class='back_btn'>Go Back</button>";
?>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
<?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='product_main_handler_div'>";
        echo "<div class='product_inner_div'>";
        echo "<p> ID : " . $row['product_id'] . " </p>";
        echo "<p> Title : " . $row['title'] . " </p>";
        echo "<p> Brand : " . $row['brand'] . " </p>";
        echo "<p> Type : " . $row['type'] . " </p>";
        echo "<p> Price : " . $row['price'] . " </p>";
        echo "<p> Quantity : " . $row['quantity'] . " </p>";
        echo "</div>";
        echo "</div>";
    }
    exit;
}

$stmt = mysqli_prepare($conn, "SELECT * FROM products_table");
$stmt->execute();
$result = $stmt->get_result();


echo "<div class='product_main_handler_div'>";

while ($row = mysqli_fetch_assoc($result)) {
    $styleTrue = false;
    mysqli_data_seek($lowStockResults, 0);

    while ($lowStockRow = mysqli_fetch_assoc($lowStockResults)) {
        if ($row['brand'] == $lowStockRow['brand'] || $row['type'] == $lowStockRow['type'] && $lowStockRow['stock_limit'] >= $row['quantity']) {
            if ($row['brand'] == $lowStockRow['brand'] && $row['type'] == $lowStockRow['type'] && $lowStockRow['stock_limit'] >= $row['quantity']) {
                $styleTrue = true;
                break;
            }
        }
    }

    if ($styleTrue) {
        echo "<div class='product_inner_div low_stock_product'>";
    } else {
        echo "<div class='product_inner_div'>";
    }

    echo "<p> ID : " . $row['product_id'] . " </p>";
    echo "<p> Title : " . $row['title'] . " </p>";
    echo "<p> Brand : " . $row['brand'] . " </p>";
    echo "<p> Type : " . $row['type'] . " </p>";
    echo "<p> Price : " . $row['price'] . " </p>";
    echo "<p> Quantity : " . $row['quantity'] . " </p>";
    echo "<p> 
    <form method='POST' action='sale_process.php'>
        <input type='hidden' value='" . $row['product_id'] . "' name='sales_product_id' />
        <button type='submit' class='sale_sub_btn'> Sale </button>
    </form> </p>";

    echo "<button type='button' class='add_quantity_btn'>Add Quantity</button>";
    echo "<div class='main_quantity_add_div'>
     <form method='POST' class='add_quantity_real_form' action='add_quantity_process.php'>
        <input type='hidden' value='" . $row['product_id'] . "' name='add_quantity_product_id' />
        <input type='number' name='quantity_value' placeholder='Enter Quantity'>
        <button type='submit'>Add Quantity</button>
     </form> </div>";

    echo "</div>";
}
echo "</div>";

?>
<script src="logic.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<script>
    var show_low_stock_products_main_div = document.querySelector(".show_low_stock_products_main_div");
    var fa_bell = document.querySelector(".fa-bell");

    fa_bell.addEventListener("click", function() {
        if (show_low_stock_products_main_div.style.top == "-100%") {
            show_low_stock_products_main_div.style.top = "10%";
        } else {
            show_low_stock_products_main_div.style.top = "-100%";
        }
    })
</script>