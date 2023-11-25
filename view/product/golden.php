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
        <h2>CHÓ GOLDEN RETRIEVER</h2>
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
                <h2>NHỮNG ĐIỀU CẦN BIẾT VỀ CHÓ GOLDEN RETRIEVER</h2>
                <b></b>
            </div>
            <h3>1) Nguồn gốc</h3>
            <p>Chó Golden có nguồn gốc từ Anh xuất hiện từ thời kỳ Victoria (1837 – 1901). Chúng được cho là kết
                quả của 1 quá trình kết hợp, pha trộn, phối giống giữa các giống Spaniels, Setters khác. Hay thậm chí
                các nhà nghiên cứu còn tin rằng trong mã gen của chúng là cả giống chó Newfoundland và chó Bloodhound.
            </p>
            <img src="img/des/GD1.jpg" alt="">
            <p>Chó Golden Retriever được gọi với cái tên khác là Golden Flat-Coat. Giống chó Golden Retriever thuần
                chủng có bộ lông vàng dài, thông minh tuyệt đỉnh, được huấn luyện nghiệp vụ và là cánh tay phải của
                những người thợ săn. Hơn thế còn là sự lựa chọn lý tưởng làm thú cưng trong mỗi gia đình.</p>
            <p>Chó Golden được biết đến là giống chó vô cùng thông minh và trung thành hiền lành và thân thiện với con
                người và các loài động vật khác. Vì vậy chúng luôn được yêu thích và được lựa chọn làm thú cưng trong
                nhiều hộ gia đình.</p>
            <p>Golden là giống chó biết nghe lời chủ nhân và hoàn thành nhiệm vụ vô cùng suất sắc. Chẳng ấy vậy mà chúng
                luôn là cánh tay phải đắc lực cho những người thợ săn bởi chiếc mũi vô cùng nhạy của mình. Hiện nay trên
                thế giới, chó Golden được dùng làm chó nghiệp vụ để đánh hơi phát hiện ra nơi cất giữ ma tuý của tội
                phạm.</p>
            <h3>2) Đặc điểm</h3>
            <h4>2.1) Ngoại hình</h4>
            <p>Chó Golden sở hữu một cơ thể khoẻ mạnh dẻo dai tỉ lệ cơ thể chúng cân đối và hài hoà. Golden có cái đầu to cùng với chiếc mõm hơi vát, kèm bộ hàm rộng và rất khỏe cùng với hàm răng sắc bén giúp chúng có thể tìm kiếm, săn mồi giúp những người thợ săn. Mũi của chúng có màu đen vô cùng nhạy bén với các mùi, mắt Golden có màu nâu với viền đen sẫm. Đôi tai Golden không quá to, rủ xuống. Golden có cơ ngực khá vạm vỡ, chiếc đuôi dài, cùng bộ long óng mượt.</p>
            <h4>2.2) Tính cách</h4>
            <p>Chó Golden vô cùng trung thành, ngoan ngoãn và luôn nghe theo mệnh lệnh của chủ nhân. Chúng thích hoạt động vui chơi ở bên ngoài trời.Chó Golden còn là những người bạn tận tuỵ của gia đình bạn.</p>
            <video controls="controls">
                <source src="img/des/GD2.mp4" type="video/mp4">
            </video>
            <p>Nó rất thông minh và nhạy bén. Nó luôn kiên nhẫn và nhẹ nhàng với trẻ em. Là giống chó năng động và tình cảm, nếu bị bỏ mặc trong thời gian dài, Golden Retriever có thể trở nên nghịch ngợm.</p>
            <p>Golden Retriever cần tập thể dục hàng ngày, nhưng thích lấy bóng và gậy, vì vậy việc tập luyện khá dễ dàng; cũng thích bơi lội. Hãy chắc chắn rằng con chó này vận động tốt và không cho ăn quá nhiều, vì nó có xu hướng tăng cân.</p>
            <h3>3) Môi trường sống</h3>
            <p>Golden Retriever có thể dễ dàng thích nghi với điều kiện căn hộ, nhà phố nếu được vận động đầy đủ.</p>
            <img src="img/des/GD3.jpg" alt="">
            <p>Trong điều kiện Việt Nam, khí hậu nóng ẩm. Bạn không nên đưa chó ra ngoài lúc trời nắng nóng. Bạn có thể dành 30-60 phút mỗi ngày vào lúc sáng sớm hoặc khi trời tối để chạy thể dục, chơi trò chơi hoặc huấn luyện chó Golden các lệnh cơ bản.</p>
            <p>Bất kể môi trường nào, Golden Retriever đòi hỏi rất nhiều về tinh thần và thể chất mỗi ngày nên hãy chú ý chế độ tập luyện và vui chơi của chúng nhé.</p>
        </div>
    </div>
</body>

</html>