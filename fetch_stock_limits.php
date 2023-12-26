<?php
include "config.php";
include "css.php";

$stmt = mysqli_prepare($conn, "SELECT * FROM low_stock_products");
$stmt->execute();
$result = $stmt->get_result();

echo "<h1 class='top_h1'>Your All Sets Low Stock Limits </h1>";
echo ' <table class="table">
<thead class="table-dark">
  <tr>
    <th>Brand</th>
    <th>Type</th>
    <th>Stock Limit</th>
    <th>Delete</th>
  </tr>
</thead>
<tbody>
';
foreach ($result as $row) {
  echo '
    <tr>
        <td>' . (!empty($row['brand']) ? $row['brand'] : 'NULL') . '</td>
        <td>' . (!empty($row['type']) ? $row['type'] : 'NULL') . '</td>
        <td>' . $row['stock_limit'] . '</td>
        <td> <a href="fetch_stock_limits.php?id=' . $row['id'] . '" class="delete_low_stock_row_a">Delete </td>
    </tr>';
}
echo '</tbody>
</table>';


if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
  $stmt = mysqli_prepare($conn, "DELETE FROM low_stock_products WHERE id = ?");
  $stmt->bind_param("i", $_GET['id']);
  if ($stmt->execute()) {
    echo "<h1 class='alert_h1'> Row Delete Successfully </h1>";
  } else {
    echo "<h1 class='alert_h1'> Row Cannot Delete </h1>";
    exit;
  }
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>