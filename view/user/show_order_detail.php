<?php
    include "../apps/config/connectdb.php";

    if (isset($_SESSION["id_user"]) && isset($_POST["order_detail"])) {
        $id_order = $_POST["id_order"];

        $stmt = $conn->prepare('SELECT * FROM web.order_detail WHERE id_order=:id_order');
        $stmt->bindParam(':id_order', $id_order);
        $stmt->execute();
        $results1 = $stmt->fetch(PDO::FETCH_ASSOC);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    th,
    td {
        border: 1px;
        border-style: dotted;
    }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="row">
            <div class="col-5">
                <table class="order_detail">
                    <thead>
                        <tr>
                            <th colspan="4">Đơn hàng của bạn</th>
                        </tr>
                        <tr>
                            <td>Mã sản phẩm</td>
                            <td>Hình ảnh</td>
                            <td>Số lượng</td>
                            <td>Đơn giá</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        while ($results = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $temp_total = $results["price"] * $results["amount"];
                            $total = $total + $temp_total;?>
                        <tr>
                            <td><?php echo $results["product_name"]?></td>
                            <td><?php echo $results["picture"]?></td>
                            <td><?php echo $results["amount"]?></td>
                            <td><?php echo number_format($results["price"])?> ₫</td>
                            <?php }?>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Tổng cộng</td>
                            <td colspan="2"> </td>
                            <td><span><?php echo number_format($total)?> ₫</span></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-6">
                <table class="order_info">
                    <thead>
                        <tr>
                            <th colspan="4">Thông tin đặt hàng</th>
                        </tr>
                        <tr>
                            <td>Họ và tên</td>
                            <td>Địa chỉ</td>
                            <td>Số điện thoại</td>
                            <td>Email</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $results1["order_owner"]?></td>
                            <td><?php echo $results1["address"]?></td>
                            <td><?php echo $results1["phone"]?></td>
                            <td><?php echo $results1["email"]?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>

</html>