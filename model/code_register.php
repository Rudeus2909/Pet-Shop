<?php
include('../apps/config/connectdb.php');

if(isset($_POST['register'])) {
    $username = $_POST['username'];

    //Kiểm tra username có tồn tại hay chưa
    $stmt = $conn->prepare("SELECT * FROM web.user WHERE username=:username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $count1 = $stmt->rowCount();
    if($count1 > 0) {
        //Nếu username tồn tại thì thông báo lỗi và trở về trang đăng kí
        echo '<script type="text/javascript">';
        echo 'alert("Tài khoản đã tồn tại");';
        echo 'window.location.href="index.php?act=register";'; 
        echo '</script>';
    } else {
        //Thực hiện thêm user vào CSDL
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $stmt = $conn->prepare("INSERT INTO web.user (email, username, password) VALUES (:email, :username, :password)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        echo '<script type="text/javascript">';
        echo 'alert("Đăng ký thành công");';
        echo 'window.location.href="index.php?act=login";'; 
        echo '</script>';
    }

}
?>