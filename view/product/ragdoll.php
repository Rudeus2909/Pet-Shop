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
                <p class="product_name"><?php echo $row["product_name"]?></p>
                <p class="price"><?php echo number_format($row["price"])?> ₫</p>
                <a class="product_detail" style="text-decoration: none;" href="index.php?act=product_detail&&id=<?=$row['id_product'];?>">Chi tiết sản phẩm</a>
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
            <img src="img/des/RD1.jpg" alt="" width="650px">
            <p>Cũng từ đó, Ann Baker bắt tay vào gây giống Ragdoll với các tiêu chuẩn nghiêm ngặt.</p>
            <p>Năm 2002, mèo Ragdoll được công nhận là giống mèo chính thức bởi hiệp hội mèo Quốc tế.</p>
            <h3>2) Đặc điểm</h3>
            <h4>2.1) Ngoại hình</h4>
            <p>Nổi tiếng là một trong những giống mèo to lớn nhất thế giới, mèo Ragdoll sở hữu thân hình mũm mĩm, dễ
                thương. Một chú mèo Ragdoll khi trưởng thành có cân nặng vào khoảng 5,5 -9 kg, chiều cao từ 27-38 cm.
            </p>
            <img src="img/des/RD2.jpg" alt="" width="650px">
            <p>Đầu mèo Ragdoll to, tròn được bao phủ bởi lớp lông xù, đôi mắt màu xanh ngọc, long lanh, cuốn hút đầy ma
                lực. Đôi tai khá mỏng, dựng đứng cân đối với khuôn mặt. Mõm ngắn và thon nhọn, chiếc đuôi mèo dài cử
                động linh hoạt theo mỗi lần di chuyển cơ thể.</p>
            <h4>2.2) Tính cách</h4>
            <p>Ngoan ngoãn, hòa nhã và hòa đồng, Ragdolls là người bạn đồng hành lý tưởng trong nhà. Một trong những đặc
                điểm đẹp nhất của những chú mèo này là tính cách thoải mái, ngọt ngào.</p>
            <video controls="controls" width="650px">
                <source src="img/des/RD4.mp4" type="video/mp4">
            </video>
            <p>Chúng rất đáng yêu và trung thành, rất biết cách nũng nịu và lấy lòng chủ nhân. Nếu bạn có một ngày tồi
                tệ, họ sẽ ôm bạn vào lòng để an ủi nhẹ nhàng để bạn sớm mỉm cười trở lại. Một người bạn tốt, bạn đồng
                hành tuyệt vời.</p>
            <h3>3) Cách chăm sóc</h3>
            <p>Bộ lông dài của mèo Ragdoll cần phải chải chuốt thường xuyên để tẩy hết lớp lông chết và chỉ tắm gội cho
                chúng những khi nào thật cần thiết mà thôi. Việc bộ lông của chúng sạch sẽ khiến chúng luôn ở trạng thái
                tốt nhất.</p>
            <img src="img/des/RD3.jpg" alt="" width="650px">
            <p>Thường xuyên vệ và sinh kiểm tra các vùng mắt, cổ, tai và bàn chân cho chúng hằng ngày.</p>
        </div>
    </div>
</body>

</html>