<?php
include('../apps/config/connectdb.php');

$stmt = $conn->prepare('SELECT * FROM shop.thucung');
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style_product.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style type="text/css">
        ul.price{
            list-style: none;
            column-count: 4;
            column-gap: 3px;
            margin-top: 0;
            padding: 0;
            display: block;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            padding-inline-start: 20px;
        }
        ul.price li:nth-child(2n-1){
            background: #f8fbe9;
        }
        ul.price li:nth-child(2n){
            background: #fff;
        }
        ul.price li{
            padding: 5px 10px;
            font-size: 18px;
            margin: 0;
            break-inside: avoid-column;
            display: flex;
        }
        .addcart{
            margin-left: 9%;
            padding: 5px 1px;
            background: #fff;
            color: #555;
            text-decoration: none;
            font-weight: 500;
            font-size: 1.2em;
            transition: 0.5s;
        }
        .addcart:hover{
            background: #a7b612;
            color: #fff;
        }
    </style>
    <title>Sản phẩm</title>
</head>
<body>
    <div class="main">
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
        <div class="card">
            <div class="image">
                <img src="<?php echo $row["hinhanh"]; ?>" alt="">
            </div>
            <div class="caption">
                <p class="rate">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </p>
                <p class="product_name"><?php echo $row["tenthucung"];?></p>
                <p class="count">Giá: <span><?php echo number_format($row["giathucung"]);?></span> đồng</p>
                <form class="form" action="addcart.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row["ma_thucung"];?>">
                    <input type="hidden" name="img" value="<?php echo $row["hinhanh"]; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $row["tenthucung"];?>">
                    <input type="hidden" name="count" value="<?php echo $row["giathucung"];?>">
                    <input class="addcart" type="submit" name="addtocart" value="Thêm vào giỏ hàng">
                </form>
            </div>
        </div>
        <?php };?> 
    </div>
    <div class="info">
        <div>
            <br>
            <h2 style="text-align: center;">
                <span style="color: #0000ff; font-size: 80%;">
                    Mua chó con, chó cảnh giá rẻ nhất bao nhiêu tiền? | Bảng giá bán chó cảnh (chó kiểng) 2023 tại Pet Cute.
                </span>
            </h2>
        </div>
        <p style="text-align: center;">
            <span style="font-size: 110%; color: #ff00ff;">
                (Chó con từ 2 tháng tuổi, tiêm phòng, tẩy giun đầy đủ)
            </span>
        </p>
        <p style="text-align: center;">
            <span style="font-size: 100%;">
                <strong>Đơn vị tính:</strong> triệu đồng
            </span>
        </p>
        <ul class="price">
            <li>Giá cho Poodle: >2.5</li>
            <li>Giá cho Phốc sóc: >4</li>
            <li>Giá cho Corgi: >4.2</li>
            <li>Giá cho Shiba: >6</li>
            <li>Giá cho Alaska: >5</li>
            <li>Giá cho Samoyed: >5.7</li>
            <li>Giá cho Husky: >4</li>
            <li>Giá cho Golden Retriever: >4</li>
            <li>Giá cho Bull Pháp: >5.4</li>
            <li>Giá cho Bulldog: >2.8</li>
            <li>Giá cho Pug: >0.8</li>
            <li>Giá cho Becgie: >5.7</li>
            <li>Giá cho Phú Quốc: >1</li>
            <li>Giá cho Bắc Hà: >1</li>
            <li>Giá cho Akita: >6</li>
            <li>Giá cho Chihuahua: >0.9</li>
            <li>Giá cho Lạp Xưởng: >2.5</li>
            <li>Giá cho Bắc Kinh: >2.5</li>
            <li>Giá cho Doberman: >4.6</li>
            <li>Giá cho Alabai: >10</li>
        </ul>
    </div>
</body>
</html>