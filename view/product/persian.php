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
        <h2>MÈO BA TƯ</h2>
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
                <h2>NHỮNG ĐIỀU CẦN BIẾT VỀ MÈO BA TƯ</h2>
                <b></b>
            </div>
            <h3>1) Nguồn gốc</h3>
            <p>Mèo Ba Tư có bộ lông dày và dài, bao phủ khắp cơ thể, thân hình đầy đặn, mập mạp vô cùng dễ thương, đáng
                yêu. Một chú mèo Ba Tư trưởng thành có cân nặng khoảng 3kg-5.5kg, chiều cao từ vai đến chân khoảng 25-37
                cm. Tuổi thọ trung bình của mèo Ba Tư từ 10-12 năm.
            </p>
            <p>Mèo Ba Tư có chiếc đầu to đặc trưng, hai mắt long lanh màu ngọc bích, mắt to tròn đáng yêu. Chiếc mũi tịt
                cùng 2 má bánh bao tạo nên khuôn mặt bầu bĩnh. Đôi tai khá nhỏ, cân đối thường dựng đứng ở trên đỉnh
                đầu. Những chú mèo thuộc dòng này có chiếc đuôi to và dài cùng phần lông đuôi xù, di chuyển nhẹ nhàng
                tạo nên vẻ tao nhã, quý tộc.</p>
            <img src="img/des/PS1.jpg" alt="" width="650px">
            <p>Mèo Ba Tư có bộ lông dày và rậm vì vậy việc vệ sinh lông và vấn đề rụng lông sẽ là vấn đề đáng lưu tâm,
                bạn nên chải lông cho mèo mỗi ngày và tắm cho cún ít nhất 1lần/1 tuần. Ngoài ra như đa số các giống mèo
                khác, bộ lông của mèo Ba Tư cũng gồm hai lớp để giữ nhiệt cho cơ thể, phần lông ở bụng và ngực sẽ dày,
                rậm nhất. Màu lông khá đa dạng bao gồm: vàng, màu kem, trắng, màu đồi mồi hay tam thể…</p>
            <h3>2) Đặc điểm</h3>
            <h4>2.1) Ngoại hình</h4>
            <p>Mèo Ba Tư có bộ lông dày và dài, bao phủ khắp cơ thể, thân hình đầy đặn, mập mạp vô cùng dễ thương, đáng
                yêu. Một chú mèo Ba Tư trưởng thành có cân nặng khoảng 3kg -5.5kg, chiều cao từ vai đến chân khoảng
                25-37 cm. Tuổi thọ trung bình của mèo Ba Tư từ 10-12 năm.</p>
            <img src="img/des/PS2.png" alt="" width="650px">
            <p>Mèo Ba Tư có chiếc đầu to đặc trưng, hai mắt long lanh màu ngọc bích, mắt to tròn đáng yêu. Chiếc mũi tịt
                cùng 2 má bánh bao tạo nên khuôn mặt bầu bĩnh. Đôi tai khá nhỏ, cân đối thường dựng đứng ở trên đỉnh
                đầu. Những chú mèo thuộc dòng này có chiếc đuôi to và dài cùng phần lông đuôi xù, di chuyển nhẹ nhàng
                tạo nên vẻ tao nhã, quý tộc.</p>
            <h4>2.2) Tính cách</h4>
            <p>Mèo Ba Tư là dòng mèo hiền lành, tính cách ôn hoà. Chú mèo rất hoà đồng, dễ lại gần bầu bạn. Mèo Ba Tư
                không thích ổn ào, náo nhiệt, chúng thích những không gian yên tĩnh, rộng rãi để vui đùa, khám phá. Đặc
                biệt mèo Ba Tư vô cùng ngoan ngoãn và biết vâng lời, hiếm khi thấy chúng phá phách hay cắn cào. Vì vậy,
                nếu bạn đang băn khoăn không biết nuôi thú cưng gì thì mèo Ba Tư là một sự lựa chọn tuyệt vời.</p>
            <img src="img/des/PS3.png" alt="" width="650px">
            <h3>3) Cách chăm sóc</h3>
            <h4>3.1) Thức ăn</h4>
            <p>Nhiều người rất muốn nuôi mèo nhưng lại đau đầu không biết nên cho mèo ăn gì để chăm sóc vừa đơn giản mà
                lại phát triển toàn diện. Đối với các dòng mèo cảnh, chăm sóc sẽ đơn giản hơn cún, bạn chỉ cần cho chúng
                ăn các loại hạt cám viên chế biến sẵn cũng đã đầy đủ chất dinh dưỡng. Ngoài ra, có thể cho mèo Ba Tư ăn
                có loại thịt như ức gà, thịt heo nạc… hoặc các loại pate cũng là món ăn khoái khẩu của chúng.</p>
            <img src="img/des/PS4.png" alt="" width="650px">
            <h4>3.2) Vệ sinh</h4>
            <p>Vào mùa hè, bạn nên cắt tỉa bớt lông để chúng luôn cảm thấy dễ chịu, thoải mái. Khi tắm bạn nên vệ sinh
                sạch sẽ tất cả các bộ phận trên cơ thể mèo, giúp loại bỏ các bụi bẩn, mầm bệnh. Sau khi tắm bạn lấy khăn
                lau và sấy khô cho mèo, tránh để “Boss” trong trạng thái ẩm ướt quá lâu dễ dẫn đến cảm lạnh.</p>
        </div>
    </div>
</body>

</html>