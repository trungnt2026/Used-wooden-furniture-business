<?php

include "../config.php";

$username = "admin";

$password = password_hash(
    "123456",
    PASSWORD_DEFAULT
);

$sql = "
INSERT INTO admins(username,password)
VALUES('$username','$password')
";

if (mysqli_query($conn, $sql)) {
    echo "Tao admin thanh cong";
} else {
    echo mysqli_error($conn);
}
