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
            <img src="img/des/ALN1.jpg" alt="" width="700px">
            <p>Vào thời kì sau thế chiến thứ 2, số lượng mèo Anh Lông Ngắn bị giảm sút nghiêm trọng. Việc tìm được một
                chú mèo Anh Lông Ngắn
                thuần chủng là vô cùng khan khiếm. Tuy nhiên với sự cố gắng của nền khoa học, người ta đã nhân giống và
                khôiphujcc thành công giống Mèo Anh Lông Ngắn. Ngày nay, Mèo Anh Lông Ngắn là giống mèo được ưa chuộng
                nhất trong
                tất cả các giống mèo.</p>
            <h3>2) Đặc điểm</h3>
            <h4>2.1) Ngoại hình</h4>
            <p>Mèo Anh Lông Ngắn có thân hình dài, cân đối với khuôn mặt bầu bĩnh đáng yêu. Cân nặng của những chú mèo
                Anh Lông Ngắn trưởng thành dao động từ 5kg -8kg, tuổi thọ vào khoảng 10-12 năm.</p>
            <p>Sở hữu chiếc đầu to tròn, chiếc mũi nhỏ nhắn vô cùng xinh xắn và đáng yêu. Đôi tai khá nhỏ so với đầu,
                tai có phần hơi cụp xuống. Đôi mắt tròn xoe, long lanh, có nhiều màu mắt, trong đó màu vàng đồng là phổ
                biến nhất. Đặc biệt hai bên má tròn, bầu bĩnh, như những chiếc bánh bao. nhìn vào vô cùng đáng yêu, dễ
                thương.</p>
            <video controls="controls">
                <source src="img/des/ALN3.mp4" type="video/mp4">
            </video>
            <p>Những chú mèo Anh lông ngắn có bộ lông dày, sờ vào cảm giác mềm mại và êm tay, lông của chúng mọc phủ đều
                trên khắp cơ thể. Màu lông của mèo Anh lông ngắn khá đa dạng: màu xám xanh là màu phổ biến nhất, ngoài
                ra còn các màu như: bicolor, golden, lilac, silver….</p>
            <h4>2.2) Tính cách</h4>
            <p>Mèo Anh lông ngắn có tính cách hướng nội, yêu thích sự yên tĩnh, không gây ồn ào. Những chú mèo vô cùng
                hiền lành và thân thiện, đặc biết thích chúng cảm giác được âu yếm, vuôt ve từ phía chủ nhân. Mèo Anh
                Lông Ngắn là
                giống thú cưng ngoan ngoãn, biết nghe lời. Khả năng học hỏi, nghe theo mệnh lệnh của chúng được đánh giá
                khá giỏi. Tuy nhiên với đặc tính khá lười, những chú mèo thường nằm dài, ít vận động dễ dẫn tình trạng
                tăng cân béo phì. Vì vậy bạn nên dành thời gian để nô đùa, vui chơi với những con “ Sen”.</p>
            <h3>3) Cách chăm sóc</h3>
            <h4>3.1) Thức ăn</h4>
            <p>Với đặc tính lười vận động, thích nằm ườn của dòng mèo Anh Lông Ngắn, bạn nên cung cấp lượng thức vừa đủ
                để tránh
                tình trạng dư thừa dễ khiến các bé mèo bị bệnh tăng cân béo phì. Thực đơn mỗi bữa ăn có thể là cơm kết
                hợp với thịt gà, thịt heo nạc, pate,…ngoài ra bạn cần bổ sung các loại rau củ để hệ tiêu hoá được ổn
                định. Đồng thời hấp thu những chất dinh dưỡng thiết yếu khác giúp phát triển đều, mượt lông,…Nếu bạn
                không có thời gian chuẩn bị bữa ăn cho mèo, có chuyển sang thức ăn khô là các loại hạt cám viên cho mèo
                uy tín chất lượng trên thị trường như Catsrang, Royal Canin,…</p>
            <img src="img/des/ALN2.jpg" alt="" width="650px">
            <h4>3.2) Vệ sinh</h4>
            <p>Do sở hữu bộ lông khá dày nên việc vệ sinh cho những chú mèo Anh Lông Ngắn là vô cùng cần thiết. Bạn cần
                chải lông
                mỗi ngày để loại bỏ lông rụng và tránh bị nấm. Bạn nên thường xuyên tắm rửa, cắt tỉa móng cho chú mèo,
                giúp bề ngoài của chúng luôn được xinh xắn và đáng yêu. Đồng thời cũng chú ý vệ sinh kĩ càng các bộ phận
                như mắt , mũi, tai bằng việc rửa qua bằng nước muối sinh lí giúp mèo tránh khỏi những mầm bệnh, bụi
                bẩn,…</p>
        </div>
    </div>
</body>

</html>