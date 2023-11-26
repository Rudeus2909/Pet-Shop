<?php
    include "../apps/config/connectdb.php";

    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $stmt = $conn->prepare('SELECT * FROM web.product WHERE id_product=:id_product');
    $stmt->bindParam(':id_product', $id);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt1 = $conn->prepare('SELECT * FROM web.product_detail WHERE id_product=:id_product');
    $stmt1->bindParam(':id_product', $id);
    $stmt1->execute();

    $results1 = $stmt1->fetch(PDO::FETCH_ASSOC);

    //Xuất các sản phẩm tương tự
    $id_type = $results["id_type"];
    $stmt2 = $conn->prepare('SELECT * FROM web.product WHERE id_type=:id_type');
    $stmt2->bindParam(':id_type', $id_type);
    $stmt2->execute();
    $results2 = $stmt2->fetchAll(PDO::FETCH_OBJ);

    //Kiểm tra danh mục của id_product có phải là Phụ kiện hay không
    //Fetch dữ liệu trong CSDL
    $stmt3 = $conn->prepare('SELECT * FROM web.product JOIN web.category ON web.product.id_category=web.category.id_category
                                                        WHERE id_product=:id_product AND web.product.id_category="3"');
    $stmt3->bindParam('id_product', $id);
    $stmt3->execute();
    $results3 = $stmt3->fetchAll(PDO::FETCH_OBJ);
    //Dùng hàm count() để đếm số dòng dữ liệu
    $count = count($results3);
    //Nếu sản phẩm là thú cưng thì hiển thị chi tiết thú cưng
    if ($count == 0){
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_product_detail.css">
</head>

<body>
    <div class="wrapper">
        <div class="row">

            <div class="col-4 img">
                <?php echo "<img src='data:image/png;base64,".base64_encode($results["picture"])."' style='width: 296px; height: 408px;'>"?>
            </div>

            <div class="col-8 description">
                <h1><?php echo $results["product_name"]?></h1>

                <b></b>
                <span>Giá: <?php echo number_format($results["price"])?> ₫</span>
                <table>
                    <tbody>
                        <tr>
                            <td>Giống: <?php echo $results1["breed"]?></td>
                            <td>Tháng tuổi: <?php echo $results1["age"]?></td>
                        </tr>
                        <tr>
                            <td>Màu: <?php echo $results1["color"]?></td>
                            <td>Giới tính: <?php echo $results1["gender"]?></td>
                        </tr>
                        <tr>
                            <td>Tiêm phòng: <?php echo $results1["vaccination"]?></td>
                            <td>Tình trạng sức khỏe: <?php echo $results1["health_condition"]?></td>
                        </tr>
                    </tbody>
                </table>
                <p><span style="font-weight: 500; color: red; font-size: 20px">Lưu ý: </span><i>Giá sản phẩm có thể thay
                        đổi theo từng thời điểm. Inbox fanpage hoặc gọi hotline để biết
                        thêm chi tiết</i></p>
                <form action="index.php?act=add_cart" method="post">
                    <input type="hidden" name="id_product" value=<?=$results["id_product"]?>>
                    <input type="hidden" name="product_name" value="<?=$results["product_name"]?>">
                    <input type="hidden" name="picture"
                        value="<?="<img src='data:image/png;base64,".base64_encode($results["picture"])."' width='100px'>"?>">
                    <input type="hidden" name="price" value="<?=$results["price"]?>">
                    <div class="amount">
                        <input type="button" value="-" id="minus" onclick="subtract()">
                        <input class="text-center" type="number" name="amount" id="amount" step="1" min="1" value="1"
                            placeholder inputmode="numeric">
                        <input type="button" value="+" id="add" onclick="plus()">
                        <button class="add_cart" name="add_cart">THÊM VÀO GIỎ HÀNG</button>
                    </div>
                </form>
                <div class="contact">
                    <button class="zalo">CHAT ZALO</button>
                    <button class="hotline">GỌI HOTLINE</button>
                </div>
            </div>
        </div>

        <div>
            <div class="title">
                <b></b>
                <h2>SẢN PHẨM TƯƠNG TỰ</h2>
                <b></b>
            </div>
            <div class="pets">
                <?php foreach ($results2 as $results) { ?>
                <div class="card" style="width: 16rem; margin: 10px;">
                    <?php echo "<img style='border-radius: 5px;' src='data:image/png;base64,".base64_encode($results->picture)."' height='340px'>"?>
                    <div class="card-body">
                        <p class="card-text"><a class="card_link"
                                href="index.php?act=product_detail&&id=<?=$results->id_product?>"><?php echo $results->product_name?></a>
                        </p>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
    <script>
    let amountElement = document.getElementById('amount')
    let amount = amountElement.value

    let render = (amount) => {
        amountElement.value = amount;
    }

    let plus = () => {
        amount++
        render(amount);
    }

    let subtract = () => {
        if (amount > 1)
            amount--;
        render(amount);
    }

    amountElement.addEventListener('input', () => {
        amount = amountElement.value;
        render(amount);
    });
    </script>
</body>

</html>
<?php }
    //Nếu sản phẩm là phụ kiện thì hiển thị chi tiết phụ kiện
    else {?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_product_detail.css">
</head>

<body>
    <div class="wrapper">
        <div class="row">

            <div class="col-5 img">
                <?php echo "<img src='data:image/png;base64,".base64_encode($results["picture"])."' style='width: 396px; height: 508px;'>"?>
            </div>

            <div class="col-7 description">
                <h1><?php echo $results["product_name"]?></h1>

                <b></b>
                <span>Giá: <?php echo number_format($results["price"])?> ₫</span>
                <table style="border: none;">
                    <tr style="border: none;">
                        <td style="border: none;"><?php echo $results1["detail_description"]?></td>
                    </tr>
                </table>
                <p><span style="font-weight: 500; color: red; font-size: 20px">Lưu ý: </span><i>Giá sản phẩm có thể thay
                        đổi theo từng thời điểm. Inbox fanpage hoặc gọi hotline để biết
                        thêm chi tiết</i></p>
                <form action="index.php?act=add_cart" method="post">
                    <input type="hidden" name="id_product" value=<?=$results["id_product"]?>>
                    <input type="hidden" name="product_name" value="<?=$results["product_name"]?>">
                    <input type="hidden" name="picture"
                        value="<?="<img src='data:image/png;base64,".base64_encode($results["picture"])."' width='100px'>"?>">
                    <input type="hidden" name="price" value="<?=$results["price"]?>">
                    <div class="amount">
                        <input type="button" value="-" id="minus" onclick="subtract()">
                        <input class="text-center" type="number" name="amount" id="amount" step="1" min="1" value="1"
                            placeholder inputmode="numeric">
                        <input type="button" value="+" id="add" onclick="plus()">
                        <button class="add_cart" name="add_cart">THÊM VÀO GIỎ HÀNG</button>
                    </div>
                </form>
                <div class="contact">
                    <button class="zalo">CHAT ZALO</button>
                    <button class="hotline">GỌI HOTLINE</button>
                </div>
            </div>
        </div>

        <div>
            <div class="title">
                <b></b>
                <h2>SẢN PHẨM TƯƠNG TỰ</h2>
                <b></b>
            </div>
            <div class="pets">
                <?php foreach ($results2 as $results) { ?>
                <div class="card" style="width: 16rem; margin: 10px;">
                    <?php echo "<img style='border-radius: 5px;' src='data:image/png;base64,".base64_encode($results->picture)."' height='340px'>"?>
                    <div class="card-body">
                        <p class="card-text">
                            <a class="card_link"
                                href="index.php?act=product_detail&&id=<?=$results->id_product?>"><?php echo $results->product_name?></a>
                        </p>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
    <script>
    let amountElement = document.getElementById('amount')
    let amount = amountElement.value

    let render = (amount) => {
        amountElement.value = amount;
    }

    let plus = () => {
        amount++
        render(amount);
    }

    let subtract = () => {
        if (amount > 1)
            amount--;
        render(amount);
    }

    amountElement.addEventListener('input', () => {
        amount = amountElement.value;
        render(amount);
    });
    </script>
</body>

</html>
<?php }?>