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
        <h2>CHÓ SAMOYED</h2>
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
                <h2>NHỮNG ĐIỀU CẦN BIẾT VỀ CHÓ SAMOYED</h2>
                <b></b>
            </div>
            <h3>1) Nguồn gốc</h3>
            <p>Giống chó Samoyed có nguồn gốc từ vùng Siberia – nơi có điều kiện khí hậu vô cùng khắc nghiệt. Ban đầu
                chúng thường được sử dụng làm phương tiện kéo xe trượt tuyết, săn bắt, chăn nuôi tuần lộc</p>
            <img src="img/des/sm1.jpg" alt="" width="655">
            <p>Ngày nay, giống chó Samoyed được nhân giống và được yêu thích nhận làm thú nuôi phổ biến trên toàn thế
                giới. Tại thị trường chó cảnh ở Việt Nam, giống chó Samoyed luôn nhận được sự quan tâm, yêu thích bởi bề
                ngoài vô cùng đáng yêu, dễ thương ở giống chó này.</p>
            <h3>2) Đặc điểm</h3>
            <h4>2.1) Ngoại hình</h4>
            <p>Những chú chó Samoyed mang vóc dáng cân đối, hài hoà và khoẻ mạnh. Chó Samoyed đực trưởng thành có chiều
                cao từ 55-60 cm, cân nặng 25-30 kg. Chó cái có kích thước nhỏ hơn, chiều cao đạt từ 48-53 cm và cân nặng
                dao động từ 20-25 kg. Tuổi thọ trung bình của chó Samoyed từ 12-14 năm, tuy nhiên nếu được chăm sóc cẩn
                thận chúng có thể sống được lâu hơn.</p>
            <video controls="controls">
                <source src="img/des/sam2.mp4" type="video/mp4">
            </video>
            <p>Chó Samoyed có bề ngoài nổi bật với bộ lông trắng mướt như màu tuyết. Đầu thuôn nhỏ, hai tai có kích
                thước vừa phải, luôn trong trạng thái vểnh lên. Mũi đen nháy, hơi ướt, có khả năng phát hiện mùi hương
                rất nhạy. Đôi mắt hơi híp, nhìn vào sâu đôi mắt toát lên sự tinh ranh, nhạy bén. Mõm chó Samoyed nhọn,
                hàm răng chắc khoẻ và sắc nhọn. Đuôi dài hơi xù, cuộn tròn ở trên lưng.</p>
            <p>Chó Samoyed sở hữu bộ lông trắng, khá dày để chống chọi lại cái lạnh khắc nhiệt của mùa đông ở vùng
                Siberian. Bộ lông có hai lớp đan xen vào nhau bồng bềnh như “ cục bông” di động 4 chân . Với lớp lông
                ngoài dài, gợn sóng sờ vào hơi cứng, bên trong lớp lông ngắn hơn, mềm mại giúp ấm cho cơ thể.</p>
            <h4>2.2) Tính cách</h4>
            <p> Bắt nguồn là giống chó kéo xe, vì vậy chó Samoyed có tính cách vô cùng chăm chỉ, năng động. Những chú
                chó Samoyed luôn tràn đầy năng lượng, yêu thích vận động nặng hay chạy nhảy để giải phóng năng lượng.
                Nếu bị nhốt trong chuồng quá lâu sẽ khiến chú chó dễ cáu giận, buồn bã từ đó phát sinh các tật xấu như
                sủa nhiều, cắn đồ đạc,… một số chú chó khác sẽ chán nản, bỏ ăn, làm thể trạng các chú chó ngày càng xấu
                đi.</p>
            <p>Chó Samoyed sống rất tình cảm, trung thành và biết pha trò gây cười cho chủ nhân. Những chú chó thuộc
                dòng Samoyed thường chỉ trung thành nghe lời duy nhất một người chủ. Khi được giao nhiệm vụ, chú cún sẵn
                sàng nghe theo và hoàn thành nhiệm vụ. Đặc biết nhờ khả năng quan sát và thấu hiểu cảm xúc của chủ nhân
                nên nếu khi cảm thấy tâm trạng của bạn không được ổn, chó Samoyed sẽ làm đủ mọi trò gây cười, hài hước
                để khiến tâm trạng bạn trở nên tốt hơn. Thật đúng là “người bạn tri kỉ” đáng yêu và tình cảm!</p>
            <h3>3) Môi trường sống</h3>
            <p>Do là giống chó xuất phát từ vùng lạnh, với lớp lông khá dày. Vì vậy, nếu sống tại Việt Nam với khí hậu
                nóng ẩm, đặc biệt nhiệt độ cao vào mùa hè. Việc để cho chó sống nơi mát mẻ (tốt nhất là trong phòng điều
                hòa) là điều cần thiết.</p>
            <p>Không nên thả chó tự do, với bản năng chó kéo xe, chúng sẽ lang thang cách nhà bạn hàng cây số và rất dễ
                thành mồi ngon cho kẻ xấu hoặc bị tai nạn. Hàng ngày, bạn có thể dành 30-45 phút để chơi hoặc tập thể
                dục với cún.</p>
        </div>
    </div>
</body>

</html>