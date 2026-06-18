<?php

session_start();

require_once "../config.php";

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

?>

<h2>Quản lý sản phẩm</h2>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Giá</th>
        <th>Ảnh</th>
        <th>Hành động</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <tr>

            <td><?= $row["id"] ?></td>

            <td><?= $row["name"] ?></td>

            <td><?= number_format($row["price"]) ?></td>

            <td><?= $row["image"] ?></td>

            <td>

            <td>

                <a href="edit_product.php?id=<?= $row["id"] ?>">
                    Sửa
                </a>

                |

                <a
                    href="delete_product.php?id=<?= $row["id"] ?>"
                    onclick="return confirm('Bạn có chắc muốn xóa?')">

                    Xóa

                </a>

            </td>

            </td>

        </tr>

    <?php } ?>

</table>

<br>

<a href="dashboard.php">
    Quay lại Dashboard
</a>