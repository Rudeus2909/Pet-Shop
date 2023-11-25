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
        <h2>CHÓ POODLE</h2>
        <b></b>
    </div>
    <div class="main">
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
        <div class="card">
            <div class="image">
                <?php echo "<img src='data:image/png;base64,".base64_encode($row['picture'])."'>"?>
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
                <h2>NHỮNG ĐIỀU CẦN BIẾT VỀ CHÓ POODLE</h2>
                <b></b>
            </div>
            <h3>1) Nguồn gốc</h3>
            <p>Poodle là một trong những giống chó lâu đời nhất được con người lai tạo để săn các loài chim nước (chủ
                yếu là vịt). Đa số các nhà nghiên cứu đều thống nhất giống chó này có nguồn gốc từ Đức, nhưng đã phát
                triển thành 1 giống riêng biệt tại Pháp.</p>
            <img src="img/des/pd_des3.jpg" alt="" width="720" height="600">
            <p>Poodle cũng có thể là kết quả lai tạo của một số giống chó nước châu Âu (Tây Ba Nha, Đức, Hungary, Nga và
                Bồ Đào Nha). Hoặc cũng có thể có tổ tiên là giống Barbet Bắc Phi, được đưa đến bán đảo Iberia rồi sang
                Pháp, nơi được phát triển chuyên biệt thành chó săn thủy cầm.</p>
            <p>Cho dù xuất xứ từ đâu, thì Poodle cũng được ghi nhận là một giống chó cổ xưa. Hình minh họa những chú chó
                giống như Poodle được tìm thấy trên các đồ vật & lăng mộ của La Mã & Ai Cập cổ đại. Các hình vẽ cho thấy
                những chú chó rất giống Poodle ngày nay, đang chăn gia súc hoặc nhặt chim nước trên đầm lầy.</p>
            <p>Theo thời gian, chó Poodle được lai tạo và nhân giống để trở thành giống chó cảnh được yêu thích, ưa
                chuộng bởi bề ngoài đáng yêu và dễ thương.</p>
            <h3>2) Đặc điểm</h3>
            <h4>2.1) Ngoại hình</h4>
            <p>Điểm nổi bật ở chó Poodle là bộ lông xoăn, dày bao phủ khắp cơ thể. Cùng chiếc cổ dài, đôi mắt to tròn,
                tai dài và rũ xuống hai bên mặt. Các màu lông phổ biến ở chó Poodle: nâu đỏ, vàng mơ, đen trắng, đen,…
            </p>
            <img src="img/des/pd_des1.jpg" alt="" width="650" height="600">
            <p>Trong quá trình lai tạo, dựa vào kích cỡ của các chú chó người ta chia giống chó Poodle thành các loại:
                Standard Poodle, Miniature Poodle, Toy Poodle, Tiny Poodle, Teacup Poodle.. Mỗi loại chó Poodle có kích
                thước, đặc điểm hình dáng khác nhau</p>
            <h4>2.2) Tính cách</h4>
            <p>Poodle là giống chó sở hữu trí tuệ thông minh thứ 2 thế giới, hoạt bát , nhanh nhẹn, thích nô đùa. Nên
                việc huấn luyên chú cún là việc không quá khó khăn, chó Poodle rất biết nghe lời chủ nhân, Poodle là
                dòng chó luôn đem lại nguồn năng lượng tích cực đến bạn.</p>
            <video controls="controls" width="600" height="600">
                <source src="img/des/pd_des_vid.mp4" type="video/mp4">
            </video>
            <p>4 từ để mô tả về tính cách giống chó này là: dễ thương, thông minh, trung thành và nghịch ngợm. Bất chấp
                vẻ ngoài sang chảnh, Poodle khá rất thích chơi đùa và luôn sẵn sàng tham gia mọi cuộc vui. Chúng cũng
                rất thích mọi người và luôn mong muốn được làm hài lòng chủ. Kết hợp với trí thông minh tuyệt vời của
                mình, Poodle là chú chó hoàn hảo để bạn huấn luyện.</p>
            <h3>3) Môi trường sống</h3>
            <p>Giống chó Poodle khá dễ nuôi, chung phù hợp với mọi không gian sống từ chung cư nhỏ hay nhà không gian
                rộng lớn, sân vườn. Bạn nên dắt cún đi dạo mỗi ngày, việc này sẽ kích thích sự nhanh nhẹn, rèn luyện sức
                khoẻ cho chú cún, hơn nữa còn giảm nguy cơ thừa cân, béo phì</p>
            <img src="img/des/pd_des2.jpg" alt="" width="720" height="960">
            <p>Có lớp lông dày, tuy vậy bạn không nên để Poodle ở ngoài một mình khi trời lạnh. Chúng dễ trúng gió, cảm
                lanh và đặc biệt bị stress, cô đơn khi bị bỏ rơi. Tốt nhất là cho cún vào phòng sinh hoạt cùng gia đình
                kèm với việc giữ sạch sẽ và dạy cún đi vệ sinh đúng chỗ. Hoặc bạn có thể đặt chuồng cho cún ở nơi khô
                ráo, thoáng mát & có ánh sáng đầy đầy đủ. Tuyệt đối không để chuồng chó ở nơi ẩm thấm, tối tăm, cún dễ
                bị viêm da, ghẻ ngứa, virus... ảnh hưởng đến sức khỏe lâu dài của cún.</p>
        </div>
    </div>
</body>

</html>