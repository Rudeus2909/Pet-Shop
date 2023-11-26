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
                <h2>NHỮNG ĐIỀU CẦN BIẾT VỀ MÈO XIÊM</h2>
                <b></b>
            </div>
            <h3>1) Nguồn gốc</h3>
            <p>Mèo Xiêm xuất hiện ở Thái Lan cách nay hàng nghìn năm. Loài mèo này được coi như là thần thánh và có thể
                mang lại sự thịnh vượng cho hoàng tộc. Chúng thuộc sở hữu của hoàng gia và chỉ được nuôi tại các đền thờ
                lớn hoặc các cung điện xa hoa suốt thời phong kiến của Vương quốc Xiêm La (Siam, Thái Lan ngày nay).
            </p>
            <img src="img/des/SIM1.jpg" alt="" width="650px">
            <p>Mèo Xiêm là một trong những giống mèo lông ngắn phương Đông được công nhận, được gọi là Wichian Mat, xuất
                hiện từ thế kỷ 14. Năm 1987, chúng có mặt tại Châu Âu và du nhập vào Hoa Kỳ vào năm 1879. Ngày nay,
                giống mèo này được yêu thích trên toàn thế giới bởi vẻ đẹp độc – lạ nhưng không kém phần sang trọng, quý
                phái.</p>
            <h3>2) Đặc điểm</h3>
            <h4>2.1) Ngoại hình</h4>
            <p>Lông của chúng có rất nhiều màu sắc khác nhau và độc đáo như: xám hải cẩu, vàng kem, trắng, nâu socola,
                màu xanh nhạt và thậm chí có cả màu của hoa đinh tử hương.</p>
            <p>Mèo Xiêm là giống mèo mắt xanh, có bộ lông hai màu tương phản rất thu hút. Ngoài ra giống mèo Xiêm rất
                ngoan hiền và dễ bảo.
                Chúng được xem như một vị thần mang lại may mắn và loài mèo được nuôi phổ biến ở nhiều nước châu Âu và
                Đông Nam Á.</p>
            <h4>2.2) Tính cách</h4>
            <p>Ngoan ngoãn, hòa nhã và hòa đồng, mèo Xiêm là người bạn đồng hành lý tưởng trong nhà. Một trong những đặc
                điểm đẹp nhất của những chú mèo này là tính cách thoải mái, ngọt ngào.</p>
            <img src="img/des/SIM4.jpg" alt="" width="650px">
            <p>Những chú mèo này có tính cách cực kỳ thân thiện và gần gũi, không thích nằm lười như các giống mèo nổi
                tiếng khác. Chúng rất thích được quan tâm và hay gây sự chú ý đối với chủ nhân của mình.</p>
            <video controls="controls" width="650px">
                <source src="img/des/SIM3.mp4" type="video/mp4">
            </video>
            <p>Tính cách của Mèo Xiêm rất tốt, thích bám chủ, ngoan ngoãn, biết nghe lời. Không thích cào
                xướt da người khác, nó luôn cố gắng giấu những móng vuốt của mình vào bên trong. Không
                giống như đặc tính của loài mèo là làm biếng và nằm ì, giống mèo này rất thích vận động,
                nhanh nhẹn và hoạt bát.</p>
            <h3>3) Sức khỏe</h3>
            <p>Loại mèo nào cũng đều có thể mắc các chứng bệnh di truyền. Bạn không nên tin những lời
                khẳng định của người bán là giống mèo của họ không bao giờ có rủi ro mắc bệnh di truyền.
                Đó là nói dối và không trung thực. Hoặc họ không có hiểu biết về giống mèo đó. Bạn nên
                tránh xa những người bán đảm bảo rằng 100% giống mèo của họ không bị bệnh gì. Mèo Xiêm
                có thể mắc một số chứng bệnh di truyền như: bệnh teo võng mạc, bệnh thiếu máu tán huyết,
                phì đại cơ tim… Ngoài ra chúng còn hay mắc một số bệnh truyền nhiễm như viêm giác mạc, tiêu
                chảy do viêm ruột. Một số bệnh di tuyền thường gặp khác là rối loạn hệ thần kinh, loạn
                sản xương hông…</p>
            <img src="img/des/SIM2.jpg" alt="" width="650px">
            <p>Nhưng vấn đề chính đối với sức khỏe của mèo Xiêm không nằm ở các chứng bệnh trên. Mà nằm
                ở một căn bệnh phụ thuộc chính ở chủ nuôi: đó là béo phì. Bạn cần kiểm soát chế độ ăn,
                tránh để mèo ăn quá nhiều ảnh hưởng tới sức khỏe do béo phì. Dễ dẫn đến các chứng bệnh
                về tim mạch, xương khớp…</p>
        </div>
    </div>
</body>

</html>