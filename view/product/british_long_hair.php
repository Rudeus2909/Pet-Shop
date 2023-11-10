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
        <h2>MÈO ANH LÔNG DÀI</h2>
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
                <h2>NHỮNG ĐIỀU CẦN BIẾT VỀ MÈO ANH LÔNG DÀI</h2>
                <b></b>
            </div>
            <h3>1) Nguồn gốc</h3>
            <p>Mèo Anh lông dài có nguồn gốc từ việc nhân giống mèo Anh lông ngắn ( British shorthair ) với mèo Ba Tư.
                Từ đó mèo ALD được thừa hưởng bộ lông dài tuyệt đẹp của mèo Ba Tư cũng như tính cách ngọt ngào, tình cảm
                của mèo Anh lông ngắn.
            </p>
            <p>Mèo Anh lông dài có liên quan chặt chẽ với mèo Anh lông ngắn (mèo ALN hay British shorthair) về mặt lịch
                sử. Cả hai giống này đều có chung một tiêu chuẩn giống. Có chung các đặc điểm về tập tính, hình thể.
                Điểm khác biệt lớn nhất giữa mèo Ald và mèo Aln chính là bộ lông dài, mềm mượt của mèo ALD.</p>
            <p>Gen lông dài vốn là gen lặn. Chỉ xuất hiện ở một số ít cá thể ở các thế hệ sau. Những chú mèo lông dài
                ban đầu bị coi là lỗi tiêu chuẩn của giống mèo British shorthair. Hầu hết chúng bị triệt sản để loại bỏ
                tính trạng lông dài khỏi giống mèo ALN. Cho đến ngày nay, vẫn xuất hiện nhiều trường hợp mèo bố mẹ là
                mèo Anh lông ngắn. Nhưng lại đẻ ra mèo con có bộ lông dài.</p>
            <h3>2) Đặc điểm</h3>
            <h4>2.1) Ngoại hình</h4>
        </div>
    </div>
</body>

</html>