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
        <h2>MÈO XIÊM</h2>
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
                <h2>NHỮNG ĐIỀU CẦN BIẾT VỀ MÈO XIÊM</h2>
                <b></b>
            </div>
            <h3>1) Nguồn gốc</h3>
            <p>Mèo Xiêm xuất hiện ở Thái Lan cách nay hàng nghìn năm. Loài mèo này được coi như là thần thánh và có thể
                mang lại sự thịnh vượng cho hoàng tộc. Chúng thuộc sở hữu của hoàng gia và chỉ được nuôi tại các đền thờ
                lớn hoặc các cung điện xa hoa suốt thời phong kiến của Vương quốc Xiêm La (Siam, Thái Lan ngày nay).
            </p>
            <p>Mèo Xiêm là một trong những giống mèo lông ngắn phương Đông được công nhận, được gọi là Wichian Mat, xuất
                hiện từ thế kỷ 14. Năm 1987, chúng có mặt tại Châu Âu và du nhập vào Hoa Kỳ vào năm 1879. Ngày nay,
                giống mèo này được yêu thích trên toàn thế giới bởi vẻ đẹp độc – lạ nhưng không kém phần sang trọng, quý
                phái.</p>
            <h3>2) Đặc điểm</h3>
            <h4>2.1) Ngoại hình</h4>
        </div>
    </div>
</body>

</html>