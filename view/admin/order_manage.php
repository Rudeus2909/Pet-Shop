<?php
    include "../apps/config/connectdb.php";
    //Kiểm tra xem người sử dụng có phải admin hay không?
    if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {
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
        <table class="table table-hover">
            <tr>
                <th id="order_code">Đơn hàng</th>
                <th id="icon"> </th>
                <th>Ngày</th>
                <th>Tổng cộng</th>
                <th>Trạng thái</th>
            </tr>
            <?php while ($results = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
                <tr>
                    <td id="order_code"><?php echo $results["order_code"]?></td>
                    <td id="icon"><a href="index.php?act=manage_order_detail&&id_order=<?=$results["id_order"]?>"><i class="fa-regular fa-eye"></i></a></td>
                    <td><?php echo $results["order_time"]?></td>
                    <td><?php echo number_format($results["order_total"])?> ₫</td>
                    <td><?php echo $results["order_status"]?></td>
                </tr>
            <?php }?>
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