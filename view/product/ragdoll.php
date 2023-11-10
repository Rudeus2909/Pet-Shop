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
        <h2>MÈO RAGDOLL</h2>
        <b></b>
    </div>

    <div class="main">
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
        <div class="card">
            <div class="image">
                <?php echo "<img src='data:image/jpeg;base64,".base64_encode($row['picture'])."'>"?>
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
                <h2>NHỮNG ĐIỀU CẦN BIẾT VỀ MÈO RAGDOLL</h2>
                <b></b>
            </div>
            <h3>1) Nguồn gốc</h3>
            <p>Ragdolls được phát triển vào những năm 1960 bởi Ann Baker, một nhà chăn nuôi ở Riverside, California.
            </p>
            <p>Mèo Ragdoll xuất hiện bởi sự lai tạo phức tạp từ các giống mèo khác nhau. Mèo Ragdoll được nhân giống từ
                mèo lông dài trắng Josephine, sau một vụ tai nạn giao thông, Josephine phải trải qua các thí nghiệm về
                di truyền và dường như từ đó cấu trúc gen của cô mèo này đã bị thay đổi. Sau cuộc thí nghiệm Josephine
                trở nên ngoan ngoãn, dễ bảo, giỏi chịu đau và trở nên nhũn người ra khi được bế lên. Sau khi hồi phục,
                những chú mèo con được Josephine sinh ra cũng mắc chứng tương tự, khi được bế lên chúng cũng nhũn ra và
                tính cách hiền hòa như mèo mẹ.</p>
            <p>Cũng từ đó, Ann Baker bắt tay vào gây giống Ragdoll với các tiêu chuẩn nghiêm ngặt.</p>
            <p>Năm 2002, mèo Ragdoll được công nhận là giống mèo chính thức bởi hiệp hội mèo Quốc tế.</p>
            <h3>2) Đặc điểm</h3>
            <h4>2.1) Ngoại hình</h4>
        </div>
    </div>
</body>

</html>