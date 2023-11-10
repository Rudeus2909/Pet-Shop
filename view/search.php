<?php
    include "../apps/config/connectdb.php";
    
    if (isset($_POST['submit']) && isset($_POST['keyword'])){
    $keyword = $_POST['keyword'];
    $stmt = $conn->prepare('SELECT * FROM web.product JOIN web.type ON product.id_type=type.id_type
                                                    JOIN web.category ON product.id_category=category.id_category
                                                    WHERE (type.type_name LIKE :keyword) OR (category.category_name LIKE :keyword)');
    $stmt->bindValue(':keyword', '%'.$keyword.'%');
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count == 0){
        echo '<h2 style="text-align: center; margin: 15px 0 0 0;">Không tìm thấy sản phẩm</h2>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_product.css">
    <title>Tìm kiếm sản phẩm</title>
</head>
<body>
<div class="main">
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
        <div class="card">
            <div class="image">
                <?php echo "<img src='data:image/png;base64,".base64_encode($row['picture'])."'>"?>
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
</body>
</html>