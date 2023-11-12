<?php
    include "../apps/config/connectdb.php";

    $stmt = $conn->prepare('SELECT * FROM web.orders');
    $stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/manage_product.css">
</head>

<body>
    <div class="title">
        <b></b>
        <h2>QUẢN LÝ ĐƠN HÀNG</h2>
        <b></b>
    </div>
    <div>
        <table class="table table-striped table-hover">
            <tr>
                <th>Đơn hàng</th>
                <th>Ngày</th>
                <th>Trạng thái</th>
                <th>Tổng cộng</th>
            </tr>
            <?php while ($results = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
                <tr>
                    <td><?php echo $results["order_code"]?></td>
                    <td><?php echo $results["order_time"]?></td>
                    <td><?php echo $results["order_status"]?></td>
                    <td><?php echo number_format($results["order_total"])?> ₫</td>
                </tr>
            <?php }?>
        </table>
    </div>
</body>

</html>