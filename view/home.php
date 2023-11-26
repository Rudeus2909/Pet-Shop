<?php
    include "../apps/config/connectdb.php";

    $stmt = $conn->prepare('SELECT * FROM web.product JOIN web.type ON web.product.id_type=web.type.id_type WHERE web.product.id_product = "1" OR web.product.id_product = "8"
    OR web.product.id_product = "35" OR web.product.id_product = "38" OR web.product.id_product = "24"');
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_OBJ);

    $stmt1 = $conn->prepare('SELECT * FROM web.product JOIN web.type ON web.product.id_type=web.type.id_type WHERE web.product.id_product = "45" OR web.product.id_product = "47"
    OR web.product.id_product = "31" OR web.product.id_product = "32"');
    $stmt1->execute();
    $results1 = $stmt1->fetchAll(PDO::FETCH_OBJ);
?>

<link rel="stylesheet" href="css/style_home.css">
<div id="banner_home">
    <div class="info">
        <h2>VỀ CUTE PET SHOP</h2>
        <p>Cute Pet Shop là trại nhân giống thú cảnh lớn tại Việt Nam và đồng thời là hệ thống cửa hàng cung cấp phụ
            kiện, dịch vụ chăm sóc làm
            đẹp thú cưng & khách sạn thú cưng.
        </p>
        <p>Với sự đa dạng về các giống chó mèo cảnh, chúng tôi đảm bảo chất lượng con giống, nguồn gen chuẩn cùng
            quy trình nhân giống chuyên nghiệp.
            Tại Cute Pet Shop, các con giống đều là dòng thuần chủng, được chăm sóc kỹ lưỡng và có sức khỏe tốt, sẵn
            sàng về nhà mới.
        </p>
    </div>
</div>
<div class="icons_info">
    <div>
        <table>
            <tr>
                <td><img src="img/shipped.png" width="100px" alt=""><br><b>MIỄN PHÍ VẬN CHUYỂN</b><br>
                    <p>GIAO HÀNG TOÀN QUỐC: MÁY BAY, TÀU HỎA, TAXI,...</p>
                </td>
                <td><img src="img/gift.png" width="100px" alt=""><br><b>QUÀ TẶNG HẤP DẪN</b><br>
                    <p>TẶNG KÈM PHỤ KIỆN CẦN THIẾT CHO THÚ CƯNG</p>
                </td>
                <td><img src="img/100-percent.png" width="100px" alt=""><br><b>CAM KẾT THUẦN CHỦNG 100%</b><br>
                    <p>CAM KẾT THÚ CƯNG THUẦN CHỦNG KHÔNG LAI TẠP</p>
                </td>
                <td><img src="img/healthcare.png" width="100px" alt=""><br><b>BẢO HÀNH SỨC KHỎE TOÀN DIỆN</b><br>
                    <p>BÀN GIAO TỚI KHÁCH HÀNG THÚ CƯNG KHỎE MẠNH</p>
                </td>
            </tr>
            <tr>
                <td colspan="4" style="border: none;"><button class="hotline">HOTLINE: 0886.026.861</button></td>
            </tr>
        </table>
    </div>
</div>

<div class="title">
    <b></b>
    <h2>CÁC LOẠI THÚ CƯNG</h2>
    <b></b>
</div>
<div class="pets">
    <?php foreach ($results as $results) { ?>
    <div class="card" style="width: 16rem; margin: 10px;">
        <?php echo "<img style='border-radius: 5px;' src='data:image/png;base64,".base64_encode($results->picture)."' height='340px'>"?>
        <div class="card-body">
            <p class="card-text"><a class="card_link"
                    href="index.php?act=<?=$results->type_detail?>"><?php echo $results->type_name?></a></p>
        </div>
    </div>
    <?php }?>
</div>

<div class="title">
    <b></b>
    <h2>PHỤ KIỆN CHÓ MÈO, THÚ CƯNG</h2>
    <b></b>
</div>
<div class="pets">
    <?php foreach ($results1 as $results1) { ?>
    <div class="card" style="width: 16rem; margin: 30px;">
        <?php echo "<img style='border-radius: 5px;' src='data:image/png;base64,".base64_encode($results1->picture)."' height='240px'>"?>
        <div class="card-body">
            <p class="card-text"><a class="card_link"
                    href="index.php?act=<?=$results1->type_detail?>"><?php echo $results1->type_name?></a></p>
        </div>
    </div>
    <?php }?>
</div>