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
            <p>Mèo Ba Tư có bộ lông dày và rậm vì vậy việc vệ sinh lông và vấn đề rụng lông sẽ là vấn đề đáng lưu tâm,
                bạn nên chải lông cho mèo mỗi ngày và tắm cho cún ít nhất 1lần/1 tuần. Ngoài ra như đa số các giống mèo
                khác, bộ lông của mèo Ba Tư cũng gồm hai lớp để giữ nhiệt cho cơ thể, phần lông ở bụng và ngực sẽ dày,
                rậm nhất. Màu lông khá đa dạng bao gồm: vàng, màu kem, trắng, màu đồi mồi hay tam thể…</p>
            <h3>2) Đặc điểm</h3>
            <h4>2.1) Ngoại hình</h4>
        </div>
    </div>
</body>

</html>