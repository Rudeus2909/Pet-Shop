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
                <h2>NHỮNG ĐIỀU CẦN BIẾT VỀ MÈO ANH LÔNG DÀI</h2>
                <b></b>
            </div>
            <h3>1) Nguồn gốc</h3>
            <p>Mèo Anh lông dài có nguồn gốc từ việc nhân giống mèo Anh lông ngắn ( British shorthair ) với mèo Ba Tư.
                Từ đó mèo Anh Lông Dài được thừa hưởng bộ lông dài tuyệt đẹp của mèo Ba Tư cũng như tính cách ngọt ngào,
                tình cảm
                của mèo Anh lông ngắn.
            </p>
            <p>Mèo Anh lông dài có liên quan chặt chẽ với mèo Anh lông ngắn (mèo ALN hay British shorthair) về mặt lịch
                sử. Cả hai giống này đều có chung một tiêu chuẩn giống. Có chung các đặc điểm về tập tính, hình thể.
                Điểm khác biệt lớn nhất giữa mèo Anh Lông Dài và mèo Aln chính là bộ lông dài, mềm mượt của mèo Anh Lông
                Dài.</p>
            <img src="img/des/ALD1.jpg" alt="" width="700px">
            <p>Gen lông dài vốn là gen lặn. Chỉ xuất hiện ở một số ít cá thể ở các thế hệ sau. Những chú mèo lông dài
                ban đầu bị coi là lỗi tiêu chuẩn của giống mèo British shorthair. Hầu hết chúng bị triệt sản để loại bỏ
                tính trạng lông dài khỏi giống mèo ALN. Cho đến ngày nay, vẫn xuất hiện nhiều trường hợp mèo bố mẹ là
                mèo Anh lông ngắn. Nhưng lại đẻ ra mèo con có bộ lông dài.</p>
            <h3>2) Đặc điểm</h3>
            <h4>2.1) Ngoại hình</h4>
            <p>Mèo Anh Lông Dài sở hữu bô lông dài, kiêu sa, mang hơi hướng dòng mèo quý tộc. Mèo Anh Lông Dài có cân
                nặng khoảng
                4-6 kg cùng chiều cao từ 25-35 cm. Tuổi thọ trung bình từ 10-12 năm, nếu được chăm sóc trong điều kiện
                tốt chúng có thể sống đươc lâu hơn nữa.</p>
            <p>Như tên gọi, những chú Mèo Anh Lông Dài sở hữu bộ lông dài, dày làm ta từ ngoài nhìn vào cảm giác kích
                thước của
                giống mèo này vô cùng ấn tượng. Bộ lông khá rậm, bồng bềnh khi chạm vào cảm thấy mềm mượt. Màu lông đa
                dạng như: xám xanh, trắng, vàng…</p>
            <h4>2.2) Tính cách</h4>
            <p>Mèo Anh Lông Dài là dòng mèo ngoan ngoãn, thân thiện và biết nghe lời. Loài mèo này có thể sống hoà thuận
                cùng các thú cưng khác, chúng thích được chơi đùa, quấn quýt được chủ âu yếm vuốt ve khi bên cạnh. Nếu
                bạn là người bận rộn không có thời gian nô đùa với những bé mèo thì đừng lo, giống mèo Anh lông dài rất
                thông minh,hiểu chuyện, có thể tự lập, vui chơi một mình. Vì vậy Mèo ALD được nhiều người yêu thích nhận
                nuôi vì những tính cách nổi bật của loài mèo này.</p>
            <img src="img/des/ALD2.jpg" alt="" width="700px">
            <h3>3) Cách chăm sóc</h3>
            <h4>3.1) Thức ăn</h4>
            <p>Chế dộ dinh dưỡng quyết định rất lớn đến sự phát triển của bé mèo. Trong mỗi bữa ăn, bạn có thể cho chúng
                ăn cơm trộn với pate hoặc thịt bò, thịt gà, thịt lợn chứa hàm lượng protein giúp mèo phát triển khoẻ
                mạnh. Ngoài ra các loại rau củ cung cấp chất xơ, các loại vitamin,… cũng cần được thêm vào bữa ăn để
                giúp cho hệ tiêu hoá của mèo được ổn định, tăng sức đề kháng. Nếu không thể vào bếp để tự chuẩn bị những
                bữa ăn cho thú cưng của mình, bạn có thể cho chú mèo ăn các loại hạt cám viên chế biến sẵn, đó cũng là
                lựa chọn tuyệt vời để giúp mèo cưng của bạn ăn ngon miệng hơn.</p>
            <img src="img/des/ALD3.jpg" alt=""width="650px">
            <h4>3.2) Vệ sinh</h4>
            <p>Để cho mèo cưng của bạn luôn được sạch sẽ, thơm tho và nổi bật trong mắt mọi người. Bạn nên thường xuyên
                tắm rửa, vệ sinh các bộ phân trên cơ thể chú mèo. Với bộ lông dày và rậm, bạn cần tắm cho chúng ít nhất
                1 lần/ tuần. Khi tắm dùng các loại sữa tắm chuyên dụng giúp lông mềm mại, óng mượt. Và chải lông hàng
                ngày cho “cục cưng” giúp rũ bỏ phần lông rụng, tránh rối lông.</p>
        </div>
    </div>
</body>

</html>