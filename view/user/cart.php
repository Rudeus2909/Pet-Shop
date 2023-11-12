<?php
    include "../apps/config/connectdb.php";

    if (isset($_SESSION["id_user"])) {
        $id_user = $_SESSION["id_user"];

        $stmt = $conn->prepare('SELECT * FROM web.cart WHERE id_user=:id_user');
        $stmt->bindParam(':id_user', $id_user);
        $stmt->execute();

        $stmt1 = $conn->prepare('SELECT * FROM web.cart WHERE id_user=:id_user');
        $stmt1->bindParam(':id_user', $id_user);
        $stmt1->execute();
        $results1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        $count = count($results1);
        
        if ($count == 0) {
            echo '<h2 style="text-align: center; margin: 10px;">GIỎ HÀNG CỦA BẠN ĐANG RỖNG!</h2>';
            echo '<div style="display: flex;
                            justify-content: center;
                            align-items: center;">
                    <button style="margin: 10px;
                                   width: 250px;
                                   height: 35px;
                                   border: none;
                                   background: rgb(56, 168, 238);
                                   border-radius: 10px">
                    <a style="color: #fff;
                            text-decoration: none;" href="index.php?act=home">QUAY TRỞ VỀ CỬA HÀNG</a></button></div>';
        } else {

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
        <h2>GIỎ HÀNG CỦA BẠN</h2>
        <b></b>
    </div>
    <div class="wrapper">
        <div class="row">
            <div class="col-7">
                <table class="products">
                    <thead>
                        <tr>
                            <th id="product" colspan="3">Sản phẩm</th>
                            <th style="width: 100px">Giá</th>
                            <th style="width: 170px">Số lượng</th>
                            <th style="width: 100px">Tạm tính</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0;
                                while ($results = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $temp_total = $results["price"] * $results["amount"];
                                $total = $total + $temp_total;?>
                        <tr>
                            <td class="del">
                                <form action="index.php?act=del_cart_product" method="post">
                                    <input type="hidden" name="id_product" value="<?=$results["id_product"]?>">
                                    <button name="delete"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                            </td>
                            <td class="picture"><?php echo $results["picture"]?></td>
                            <td style="text-align: center;"><?php echo $results["product_name"]?></td>
                            <td style="text-align: center;"><?php echo number_format($results["price"])?> ₫</td>
                            <td>
                                <form style="display: flex; margin: 7px;" action="index.php?act=update_cart" method="post">
                                    <input type="hidden" name="id_product" value="<?=$results["id_product"]?>">
                                    <input style="background: #dfdede; border: 1px solid #ececec;" class="text-center" type="number" name="amount" id="amount" step="1" min="1"
                                        value="<?=$results["amount"]?>" placeholder inputmode="numeric">
                                    <input id="update" type="submit" name="update" value="Cập nhật">
                                </form>

                            </td>
                            <td style="text-align: center;"><?php echo number_format($temp_total)?> ₫</td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <div class="col-5">
                <table class="total">
                    <tr>
                        <th style="width: 400px;" colspan="2">Cộng giỏ hàng</th>
                    </tr>
                    <tr>
                        <td style="height: 50px;">Tạm tính</td>
                        <td><?php echo number_format($total)?> ₫</td>
                    </tr>
                    <tr>
                        <td style="height: 50px;">Tổng</td>
                        <td><?php echo number_format($total)?> ₫</td>
                    </tr>
                </table>
                <button onclick="window.history.back()" class="continue">TIẾP TỤC XEM SẢN PHẨM</button>
                <button class="payment"><a style="text-decoration: none; color: #fff" href="index.php?act=order">ĐẶT HÀNG</a></button>
            </div>
        </div>
    </div>
</body>

</html>
<?php
    }

    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Bạn cần phải đăng nhập");';
        echo 'window.history.back();'; 
        echo '</script>';
    }
?>