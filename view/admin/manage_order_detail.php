<?php
    include "../apps/config/connectdb.php";

    //Kiểm tra xem người sử dụng có phải admin hay không?
    if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {

        $id_order = $_GET["id_order"];
        
        //Lấy thông tin đơn hàng dựa trên ID các đơn hàng
        $stmt = $conn->prepare('SELECT * FROM web.orders WHERE id_order=:id_order');
        $stmt->bindParam(':id_order', $id_order);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);

        //Lấy thông tin chi tiết đơn hàng dựa trên ID đơn hàng
        $stmt1 = $conn->prepare('SELECT * FROM web.order_detail WHERE id_order=:id_order');
        $stmt1->bindParam(':id_order', $id_order);
        $stmt1->execute();
        $stmt1->setFetchMode(PDO::FETCH_ASSOC);
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
        <h2>QUẢN LÝ CHI TIẾT ĐƠN HÀNG</h2>
        <b></b>
    </div>
    <div class="row">
        <div class="col-5">
            <div class="manage_order_detail">
                <table id="manage_order_detail">
                    <tr>
                        <td id="weight">Mã đơn hàng</td>
                        <td><?php echo $results["order_code"]?></td>
                    </tr>
                    <tr>
                        <td id="weight">Ngày đặt hàng</td>
                        <td><?php echo $results["order_time"]?></td>
                    </tr>
                    <tr>
                        <td id="weight">Họ tên khách hàng</td>
                        <td><?php echo $results["order_owner"]?></td>
                    </tr>
                    <tr>
                        <td id="weight">Số điện thoại</td>
                        <td><?php echo $results["phone"]?></td>
                    </tr>
                    <tr>
                        <td id="weight">Địa chỉ</td>
                        <td><?php echo $results["address"]?></td>
                    </tr>
                    <tr>
                        <td id="weight">Email</td>
                        <td><?php echo $results["email"]?></td>
                    </tr>
                </table>
            </div>
            <div class="confirm_order">
                <form action="index.php?act=code_manage_order" method="post">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Tình trạng đơn hàng</label>
                        <select class="form-select" id="inputGroupSelect01" name="order_status">
                            <option selected><?php echo $results["order_status"]?></option>
                            <option value="Chờ xác nhận">Chờ xác nhận</option>
                            <option value="Đã xác nhận">Xác nhận đơn hàng</option>
                            <option value="Đã hủy">Hủy đơn hàng</option>
                        </select>
                    </div>
                    <input type="hidden" name="id_order" value="<?=$results["id_order"]?>">
                    <button type="submit" name="confirm" class="btn btn-success">Xác nhận</button>
                </form>
            </div>
        </div>
        <div class="col-7">
            <div class="order_info">
                <table>
                    <thead>
                        <tr>
                            <th colspan="4">Thông tin đơn hàng</th>
                        </tr>
                        <tr>
                            <td>Tên sản phẩm</td>
                            <td>Hình ảnh</td>
                            <td>Số lượng</td>
                            <td>Đơn giá</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($results1 = $stmt1->fetch()) {?>
                        <tr>
                            <td><?php echo $results1["product_name"]?></td>
                            <td><?php echo $results1["picture"]?></td>
                            <td><?php echo $results1["amount"]?></td>
                            <td><?php echo number_format($results1["price"])?> ₫</td>
                        </tr>
                        <?php }?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">Tổng cộng</td>
                            <td><?php echo number_format($results["order_total"])?> ₫</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<?php } else {
        //Nếu không phải admin thì không cho phép truy cập
        echo '<script type="text/javascript">';
        echo 'alert("Bạn không có quyền truy cập");';
        echo 'window.location.href="index.php?act=home";'; 
        echo '</script>';
}?>