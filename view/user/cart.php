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
            echo '<h2 style="text-align: center;">Giỏ hàng rỗng!</h2>';
            echo '<button><a href="index.php?act=home">Quay trở lại cửa hàng</a></button>';
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
            <div class="col-9">
                <table>
                    <thead>
                        <tr>
                            <th colspan="3">Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tạm tính</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0;
                                while ($results = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $temp_total = $results["price"] * $results["amount"];
                                $total = $total + $temp_total;?>
                        <tr>
                            <td>
                                <form action="index.php?act=del_cart_product" method="post">
                                    <input type="hidden" name="id_product" value="<?=$results["id_product"]?>">
                                    <button name="delete"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                            </td>
                            <td><?php echo $results["picture"]?></td>
                            <td><?php echo $results["product_name"]?></td>
                            <td><?php echo number_format($results["price"])?> ₫</td>
                            <td>
                                <form action="index.php?act=update_cart" method="post">
                                    <input type="hidden" name="id_product" value="<?=$results["id_product"]?>">
                                    <input type="number" name="amount" id="amount" step="1" min="1"
                                        value="<?=$results["amount"]?>" placeholder inputmode="numeric">
                                    <input type="submit" name="update" value="Cập nhật">
                                </form>

                            </td>
                            <td><?php echo number_format($temp_total)?> ₫</td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <div class="col-3">
                <table>
                    <tr>
                        <th colspan="2">Cộng giỏ hàng</th>
                    </tr>
                    <tr>
                        <td>Tạm tính</td>
                        <td><?php echo number_format($total)?> ₫</td>
                    </tr>
                    <tr>
                        <td>Tổng</td>
                        <td><?php echo number_format($total)?> ₫</td>
                    </tr>
                </table>
                <button onclick="window.history.back()">Tiếp tục xem sản phẩm</button>
                <button><a href="index.php?act=order">Đặt hàng</a></button>
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