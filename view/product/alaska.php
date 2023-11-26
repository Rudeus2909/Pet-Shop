<?php
    include "../apps/config/connectdb.php";

    $detail = $_GET['act'];
    
    $stmt = $conn->prepare('SELECT * FROM web.product JOIN web.type ON type.id_type=product.id_type WHERE type.type_detail=:detail');
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
        <h2>CHÓ ALASKA</h2>
        <b></b>
    </div>
    <div class="main">
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
        <div class="card">
            <div class="image">
                <?php echo "<img src='data:image/jpeg;base64,".base64_encode($row['picture'])."'>"?>
            </div>
            <div class="caption">
                <p class="product_name"><a class="product_link" style="text-decoration: none;"
                        href="index.php?act=product_detail&&id=<?=$row["id_product"]?>"><?php echo $row["product_name"]?></a>
                </p>
                <p class="price"><?php echo number_format($row["price"])?> ₫</p>
                <a class="product_detail" style="text-decoration: none;"
                    href="index.php?act=product_detail&&id=<?=$row['id_product'];?>">Chi tiết sản phẩm</a>
            </div>
        </div>
        <?php };?>
    </div>

    <div class="description">
        <div>
            <div class="title">
                <b></b>
                <h2>NHỮNG ĐIỀU CẦN BIẾT VỀ CHÓ ALASKA</h2>
                <b></b>
            </div>
            <h3>1) Nguồn gốc</h3>
            <p>Alaska Malamute là một trong những giống chó kéo xe lâu đời nhất của Bắc Cực. Chúng được cho là hậu duệ
                của những con chó sói thuần hóa đã đi cùng những người thợ săn thời kỳ đồ đá cũ vượt qua những cây cầu
                trên đất liền của eo biển Bering và di cư vào Bắc Mỹ khoảng 4.000 năm trước</p>
            <img src="img/des/alk_des1.jpg" alt="" width="720" height="960">
            <p>Chó Alaska được biết đến đầu tiên bởi người Mahlamut, về sau những người du mục Eskimo đã nhận ra được
                những ưu điểm nổi trội ở giống chó này nên họ đã thuần phục và lai tạo với một số giống chó khác. Kết
                quả đã tạo ra giống chó Alaska để chuyên phục vụ việc kéo xe để di chuyển, vận chuyển hàng hoá trên mặt
                đất có tuyết dày vào mùa đông ở vùng Alaska</p>
            <p>Ngày nay, Chó Alaska được quan tâm, ưa chuộng làm thú cưng trên toàn thế giới bởi tính cách hoà đồng, dễ
                thương</p>
            <h3>2) Đặc điểm</h3>
            <h4>2.1) Ngoại hình</h4>
            <p>Chó Alaska có ngoại hình to lớn, bụ bẫm. Chó đực trưởng thành cao từ 60-64 cm cân nặng dao động khoảng
                40-50 kg. Chó cái có kích thước nhỏ hơn với chiều cao từ 54-59 cm, cân nặng từ 35-40 kg. Tuổi thọ trung
                bình của chó Alaska từ 12-15 năm.</p>
            <video controls="controls" width="600" height="600">
                <source src="img/des/alk_des_video.mp4" type="video/mp4">
            </video>
            <p>- Chó Alaska nổi bật với kích thước lớn, cùng bộ lông xù và dày nhìn vô cùng dũng mãnh và oai vệ. Tỷ lệ
                cơ
                thể cân nặng, chiều cao và vóc dáng hài hòa cùng khối cơ phát triển, dẻo dai thích hợp trong việc kéo
                xe.</p>
            <p>- Đầu chó Alaska khá to, đôi tai nhọn luôn dựng thẳng trên đầu. Mõm ngắn, to đi cùng là bộ hàm vô cùng
                chắc
                khoẻ. Mắt to tròn, long lanh, khoảng cách hai mắt vừa phải, đuôi mắt hơi hếch lên, màu mắt thường là nâu
                đỏ hoặc nâu đen. Chú chó Alaska sở hữu đôi chân to, chắc khoẻ giúp loài chó này có thể di chuyển dễ dàng
                trong điều kiện tuyết dày trên mặt đất.</p>
            <p>- Bộ lông gồm hai lớp, lớp bên ngoài thô và dài có vai trò bảo vệ. Còn lớp bên trong phần lông ngắn,mềm
                mịn
                hơn giúp giữ ấm cơ thể. Các màu lông phổ biến ở loài chó Alaska gồm:nâu đỏ, đen trắng, hồng phấn, xám
                trắng…</p>
            <h4>2.2) Tính cách</h4>
            <p>- Chó Alaska là giống chó trung thành, hiền lành và kiên nhẫn. Ngoài ra, còn được biết đến là thú cưng
                thông minh và nhanh nhẹn. Vì vậy chúng có khả năng học hỏi rất nhanh và biết vâng lời chủ nhân.</p>
            <img src="img/des/alk_des2.jpg" alt="" width="664">
            <p>- Chó Alaska cực kì năng động, ưa thích chạy nhảy nhưng cũng rất tình cảm và thân thiện, hoà đồng. Bạn có
                thể cho cún vận động bằng cái bài tập luyện rèn thể lực như: kéo lốp xe, chạy đường dài.</p>
            <p>- Điều thu hút ở giống chó Alaska là chúng cực kì trung thành với chủ nhân. Chú cún sẵn sàng tuân mọi
                mệnh
                lệnh của chủ, thậm chí sẵn sàng hi sinh vì chủ nhân.</p>
            <h3>3) Môi trường sống</h3>
            <p>- Alaska có thể dễ dàng thích nghi với điều kiện căn hộ, nhà phố nếu được vận động đầy đủ.</p>
            <img src="img/des/alk_des3.png" alt="" width="720" height="960">
            <p>- Trong điều kiện Việt Nam, khí hậu nóng ẩm. Bạn không nên đưa chó ra ngoài lúc trời nắng nóng. Bạn có
                thể
                dành 30-60 phút mỗi ngày vào lúc sáng sớm hoặc khi trời tối để chạy thể dục, chơi trò chơi hoặc huấn
                luyện chó Alaska các lệnh cơ bản.</p>
            <p>- Có lớp lông dày, tuy vậy bạn không nên để Alaska ở ngoài một mình khi trời lạnh. Chúng dễ trúng gió,
                cảm
                lanh và đặc biệt bị stress, cô đơn khi bị bỏ rơi. Tốt nhất là cho cún vào phòng sinh hoạt cùng gia đình
                kèm với việc giữ sạch sẽ và dạy cún đi vệ sinh đúng chỗ. Hoặc bạn có thể đặt chuồng cho cún ở nơi khô
                ráo, thoáng mát & có ánh sáng đầy đầy đủ. Tuyệt đối không để chuồng chó ở nơi ẩm thấm, tối tăm, cún dễ
                bị viêm da, ghẻ ngứa, virus... ảnh hưởng đến sức khỏe lâu dài của cún.</p>
        </div>
    </div>
</body>

</html>