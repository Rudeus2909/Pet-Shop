<?php
    include "../apps/config/connectdb.php";
    //Kiểm tra xem người sử dụng có phải user hay không?
    if (isset($_SESSION["id_user"]) && isset($_SESSION["role"]) && $_SESSION["role"] == "user") {
        $id_user = $_SESSION["id_user"];

        $stmt = $conn->prepare('SELECT * FROM web.cart WHERE id_user=:id_user');
        $stmt->bindParam(':id_user', $id_user);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 0){
            echo '<script type="text/javascript">';
            echo 'alert("Không thể thanh toán khi chưa có sản phẩm trong giỏ");';
            echo 'window.location.href="index.php?act=home";'; 
            echo '</script>';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_cart.css">
</head>

<body>
    <div class="title">
        <b></b>
        <h2>THANH TOÁN</h2>
        <b></b>
    </div>
    <div class="wrapper">
        <form class="form" action="index.php?act=add_order" method="post">
            <div class="row">
                <div class="col-5 order_info2">
                    <h4>Thông tin thanh toán</h4>
                    <label>Họ và tên</label>
                    <input class="form-control" type="text" name="order_owner" require>

                    <label>Địa chỉ</label>
                    <input class="form-control" type="text" name="address" require>

                    <label>Số điện thoại</label>
                    <input class="form-control" type="text" name="phone" require>

                    <label>Email</label>
                    <input class="form-control" type="text" name="email" require>
                </div>
                <div class="col-6 your_order">
                    <h4>Đơn hàng của bạn</h4>
                    <table style="margin-top: 5px">
                        <tr>
                            <th style="width: 200px">SẢN PHẨM</th>
                            <th class="text-center" style="width: 200px">SỐ LƯỢNG</th>
                            <th style="width: 200px">TẠM TÍNH</th>
                        </tr>
                        <?php $total = 0;
                            while ($results = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $temp_total = $results["price"] * $results["amount"];
                            $total = $total + $temp_total;?>
                        <tr>
                            <td style="height: 40px"><?php echo $results["product_name"]?></td>
                            <td class="text-center"><?php echo $results["amount"]?></td>
                            <td><?php echo number_format($temp_total)?> ₫</td>
                        </tr>
                        <?php }?>
                        <tr>
                            <td style="height: 40px" colspan="2">Tạm tính</td>
                            <td><?php echo number_format($total)?> ₫</td>
                        </tr>
                        <tr>
                            <td style="height: 40px" colspan="2">Tổng</td>
                            <td><?php echo number_format($total)?> ₫</td>
                        </tr>
                    </table>

                    <div class="payment_methods">
                        <h4>Phương thức thanh toán</h4>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                value="option1" checked>
                            <label class="form-check-label" for="inlineRadio1">Chuyển khoản ngân hàng</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">Ví điện tử</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">Visa</label>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="total" value=<?=$total?>>
            <div class="btn">
                <button class="back"><a style="text-decoration: none; color: #fff" href="index.php?act=cart">QUAY LẠI
                        GIỎ HÀNG</a></button>
                <input class="order" type="submit" name="order" value="ĐẶT HÀNG">
            </div>
        </form>
    </div>
</body>

</html>
<?php } else {
        //Nếu không phải user thì xuất thông báo
        echo '<script type="text/javascript">';
        echo 'alert("Bạn không phải người dùng thành viên");';
        echo 'window.history.back();'; 
        echo '</script>';
}?>