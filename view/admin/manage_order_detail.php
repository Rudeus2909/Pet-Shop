<?php
    include "../apps/config/connectdb.php";

    //Kiểm tra xem người sử dụng có phải admin hay không?
    if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {

        $id_order = $_GET["id_order"];
        
        $stmt = $conn->prepare('SELECT * FROM web.orders WHERE id_order=:id_order');
        $stmt->bindParam(':id_order', $id_order);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
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
</body>
</html>
<?php } else {
        //Nếu không phải admin thì không cho phép truy cập
        echo '<script type="text/javascript">';
        echo 'alert("Bạn không có quyền truy cập");';
        echo 'window.location.href="index.php?act=home";'; 
        echo '</script>';
}?>