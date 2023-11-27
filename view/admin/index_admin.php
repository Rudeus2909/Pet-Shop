<?php 
    include "../apps/config/connectdb.php";

    //Xuất số lượng cún cưng
    $stmt = $conn->prepare('SELECT * FROM web.product WHERE id_category="1"');
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_OBJ);
    $count = count($results);

    //Xuất số lượng mèo cưng
    $stmt1 = $conn->prepare('SELECT * FROM web.product WHERE id_category="2"');
    $stmt1->execute();
    $results1 = $stmt1->fetchAll(PDO::FETCH_OBJ);
    $count1 = count($results1);

    //Xuất số lượng phụ kiện
    $stmt2 = $conn->prepare('SELECT * FROM web.product WHERE id_category="3"');
    $stmt2->execute();
    $results2 = $stmt2->fetchAll(PDO::FETCH_OBJ);
    $count2 = count($results2);

    //Xuất số lượng tài khoản
    $stmt3 = $conn->prepare('SELECT * FROM web.user');
    $stmt3->execute();
    $results3 = $stmt3->fetchAll(PDO::FETCH_OBJ);
    $count3 = count($results3);

    //Xuất số lượng đơn hàng
    $stmt4 = $conn->prepare('SELECT * FROM web.orders');
    $stmt4->execute();
    $results4 = $stmt4->fetchAll(PDO::FETCH_OBJ);
    $count4 = count($results4);
    
    //Xuất doanh thu
    $stmt5 = $conn->prepare('SELECT SUM(order_total) as revenue FROM web.orders WHERE order_status = "đã xác nhận"');
    $stmt5->execute();
    $results5 = $stmt5->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_admin.css">
</head>

<body>
    <div class="title">
        <b></b>
        <h2>TRANG QUẢN LÝ</h2>
        <b></b>
    </div>
    <div class="products">
        <div>
            <span class="puppies">
                <p>Số cún cưng: <?php echo $count?></p>
                <img src="img/admin/puppies.png" width="100px" alt="">      
            </span>
        </div>

        <div>
            <span class="kitties">
                <p>Số mèo cưng: <?php echo $count1?></p>
                <img src="img/admin/kitties.png" width="100px" alt="">
            </span>
        </div>

        <div>
            <span class="accessories">
                <p>Số phụ kiện: <?php echo $count2?></p>
                <img src="img/admin/accessories.png" width="100px" alt="">
            </span>
        </div>
    </div>
    <div class="overview">
        <div>
            <span class="accounts">
                <p>Tổng số tài khoản: <?php echo $count3?></p>
                <img src="img/admin/accounts.png" width="100px" alt="">
            </span>
        </div>

        <div>
            <span class="orders">
                <p>Tổng số đơn hàng: <?php echo $count4?></p>
                <img src="img/admin/orders.png" width="100px" alt="">
            </span>
        </div>

        <div>
            <span class="revenue">
                <p>Doanh thu: <?php echo number_format($results5->revenue)?> ₫</p>
                <img src="img/admin/salary.png" width="100px" alt="">
            </span>
        </div>
    </div>
</body>

</html>