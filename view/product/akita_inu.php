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
        <h2>CHÓ AKITA INU</h2>
        <b></b>
    </div>

    <div class="main">
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
        <div class="card">
            <div class="image">
                <?php echo "<img src='data:image/png;base64,".base64_encode($row['picture'])."'>"?>
            </div>
            <div class="caption">
                <p class="product_name"><a class="product_link" style="text-decoration: none;"
                        href="index.php?act=product_detail&&id=<?=$row["id_product"]?>"><?php echo $row["product_name"]?></a></p>
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
                <h2>NHỮNG ĐIỀU CẦN BIẾT VỀ CHÓ AKITA INU</h2>
                <b></b>
            </div>
            <h3>1) Nguồn gốc</h3>
            <p>Giống chó này có nguồn gốc từ vùng Akita nằm ở cực bắc của đảo Honsu (Nhật Bản).Theo giả thuyết của các
                nhà
                di truyền học. Những con chó nhà (Canis lupus) đầu tiên đến vùng cực bắc của đảo Honsu cùng những bộ lạc
                du
                mục.</p>
            <img src="img/des/AKT1.jpg" alt="" width="600">
            <p>Cách đây khoảng 2.000 năm. Khi những bộ lạc này định cư tại các làng nhỏ ven biển. Loài chó bản địa này
                được
                sử dụng để săn gấu, hươu nai và lợn rừng hay tham gia chiến đấu trong các cuộc chọi chó.</p>
            <p>Theo những ghi chép trên các thư tịch cổ, cũng như các câu chuyện dân gian truyền miệng. Người ta gọi
                giống
                chó săn này là Akitas Matagi.</p>
            <p>Qua bộ phim “ Chú chó Hachiko”, chó Akita được tôn vinh với lòng trung thành, yêu quý chủ nhân. Giống chó
                này
                luôn nhận được sự yêu mến và quan tâm không chỉ tại Nhật Bản mà còn khắp nơi trên thế giới.</p>
            <h3>2) Đặc điểm</h3>
            <h4>2.1) Ngoại hình</h4>
            <p> Chó Akita có ngoại hình đẹp, cân đối cùng bộ lông vàng óng mượt. Một chú chó Akita đực có chiều cao từ
                64-70 cm nặng khoảng 32-39 kg, xchó cái có kích thước nhỏ hơn với chiều cao từ 58-64 cm nặng tầm 27-30
                kg. Tuổi thọ trung bình của giống chó Akita vào khoảng 10-12 năm.</p>
            <video controls="controls">
                <source src="img/des/AKT2.mp4" type="video/mp4">
            </video>
            <p>Chó Akita có dáng bệ vệ, to lớn hiên ngang. Đầu tròn khá to, mõm ngắn, lưỡi hồng. Hai mắt nhỏ, màu đen,
                phần trán rộng nhìn vô cùng thông minh và nhanh nhẹn. Đuôi dài, cuộn tròn trên lưng. Ngực chó Akita nở
                rộng, phần bụng hơi hóp lại.</p>
            <p>Chó Akita có bộ lông khá dày gồm 2 lớp lông với các vai trò khác nhau. Phần lông ngoài dài để bảo vệ cho
                chú chó. Phần lông bên trong mềm mịn, giúp giữ ấm cho cơ thể. Nhờ vậy những chú Akita có thể chịu được
                mùa đông lạnh giá ở Nhật Bản. Các màu lông của chó Akita: Vàng trắng, màu vện, trắng… trong đó những chú
                Akita được mọi người săn đón nhiều nhất.</p>
            <h4>2.2) Tính cách</h4>
            <p>Chó Akita Inu Nhật bản trung thành và bảo vệ những người thân yêu của chúng. Alabai xa cách với người lạ
                nhưng có thể tình cảm khi nói đến gia đình của chúng.</p>
            <p>Cùng với đó, Chó Akita có thể dễ dàng thích nghi với điều kiện thời tiết. Chúng có thể hoạt động tốt
                trong thời tiết lạnh giá. Tuy nhiên, nếu bạn chuẩn bị cho chúng một chiếc nệm ấm áp thì Alabai sẽ rất
                hạnh phúc đó nhé.</p>
            <img src="img/des/AKT3.jpg" alt="" width="600">
            <p>Chúng thường được coi là một loài chó khá yên tĩnh, nhưng sẽ phát ra âm thanh báo động khi có người lạ
                đến gần. Bạn có thể thấy chúng hoạt động ngoài trời, nhưng ở trong nhà thì nhẹ nhàng và tinh ý.</p>
            <h3>3) Môi trường sống</h3>
            <p>Giống chó này vẫn có thể sống trong môi trường căn hộ, nhà ống tại Việt Nam. Tuy nhiên, điều này đòi hỏi
                phải cho chúng ra ngoài đi dạo. Tập luyện hoặc vận động nhẹ thường xuyên.</p>
            <p>Chúng thích hợp nhất với nhà có sân vườn rộng. Kể cả trong điều kiện này. Chúng cũng cần được tập luyện
                thường xuyên để giữ được vóc dáng cân đối. Bạn cần phải chuẩn bị không gian cần thiết trước khi chuẩn bị
                mua chó Akita về nuôi trong gia đình.</p>
            <p>Trong điều kiện Việt Nam, khí hậu nóng ẩm. Bạn không nên đưa chó ra ngoài lúc trời nắng nóng.</p>
        </div>
    </div>
</body>

</html>