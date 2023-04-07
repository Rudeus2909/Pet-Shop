<?php
include "../apps/config/connectdb.php";
?>
<style>
    .thongtin{
         width: 50%;
         height: 100%;
         border: 1px solid black;
         text-align: center;
         border-radius: 15px;
    }
</style>
<h3>Thông tin cá nhân</h3>
<div class="thongtin">
    <p>
        <?php
            if(isset($_SESSION['username'])){
                echo 'Xin Chào '.$_SESSION['username'].'!!!';
                $username = $_SESSION['username'];
                $stmt = $pdo->prepare('SELECT * FROM shop.taikhoan JOIN shop.khachhang ON shop.taikhoan.id=shop.khachhang.id WHERE username=:username');
                $stmt->bindParam(':username', $username);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $row = $stmt->fetch();
        ?></p><br>
        <p>Họ và tên: <?php echo $row['hotenkhachhang'];?></p>
        <p>Địa chỉ: <?php echo $row['diachi'];?></p>
        <p>Số điện thoại: <?php echo $row['sdt'];?></p>
        <p>Email: <?php echo $row['email'];?></p>
        <?php }?> 
</div>