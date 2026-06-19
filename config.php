<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "dogo2hand"
);

if (!$conn) {
    die("Lỗi kết nối: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

//test show
// echo "Kết nối thành công";