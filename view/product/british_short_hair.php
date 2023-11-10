<?php
    include "../apps/config/connectdb.php";

    $detail = $_GET['act'];
    
    $stmt = $conn->prepare('SELECT * FROM web.product JOIN web.type ON type.id_type=product.id_type WHERE type.type_detail=:detail ');
    $stmt->bindParam(':detail', $detail);
    $stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style_product.css">
    <title>Sản phẩm</title>
</head>

<body>
    <div class="title">
        <b></b>
        <h2>MÈO ANH LÔNG NGẮN</h2>
        <b></b>
    </div>

    <div class="main">
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
        <div class="card">
            <div class="image">
                <?php echo "<img src='data:image/jpg;base64,".base64_encode($row['picture'])."'>"?>
            </div>
            <div class="caption">
                <p class="rate">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </p>
                <p class="product_name"><?php echo $row["product_name"]?></p>
                <a href="index.php?act=product_detail&&id=<?=$row['id_product'];?>">Chi tiết sản phẩm</a>
            </div>
        </div>
        <?php };?>
    </div>

    <div class="description">
        <div>
            <div class="title">
                <b></b>
                <h2>NHỮNG ĐIỀU CẦN BIẾT VỀ MÈO ANH LÔNG NGẮN</h2>
                <b></b>
            </div>
            <h3>1) Nguồn gốc</h3>
            <p>Có thể bạn không nhận ra, nhưng tuổi thơ của mỗi người đã quen thuộc với hình ảnh chú mèo British
                Shorthair. Đó chính là "Chú mèo đi hia, Cheshire" trong bộ truyện Alice ở xứ sở diệu kỳ.
            </p>
            <p>British Shorthair có nguồn gốc từ vương quốc Anh. Dưới thời đại của nữ hoàng Victoria (người rất yêu
                thích và tạo ra hàng chục giống chó mèo trong suốt 64 năm trị vì của mình), các nhà nhân giống đã bắt
                đầu lai tạo những chú mèo theo tiêu chuẩn & ghi lai phả hệ cho chúng. Vào thời đó, British Shorthair là
                giống mèo duy nhất được trưng bày tại các triển lãm. Trong khi những giống khác chỉ được mô tả bằng kiểu
                lông hay màu sắc.</p>
            <p>Vào thời kì sau thế chiến thứ 2, số lượng mèo ALN bị giảm sút nghiêm trọng. Việc tìm được một chú mèo ALN
                thuần chủng là vô cùng khan khiếm. Tuy nhiên với sự cố gắng của nền khoa học, người ta đã nhân giống và
                khôiphujcc thành công giống Mèo Anh Lông Ngắn. Ngày nay, Mèo AlN là giống mèo được ưa chuộng nhất trong
                tất cả các giống mèo.</p>
            <h3>2) Đặc điểm</h3>
            <h4>2.1) Ngoại hình</h4>
        </div>
    </div>
</body>

</html>