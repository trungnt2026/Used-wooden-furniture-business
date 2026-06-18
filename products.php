<?php

include "config.php";

$sql = "SELECT * FROM products";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {

    echo "<h2>" . $row["name"] . "</h2>";

    echo "<p>";
    echo number_format($row["price"]);
    echo " VNĐ</p>";

    echo "<hr>";
}
