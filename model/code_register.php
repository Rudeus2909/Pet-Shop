<?php
include('../apps/config/connectdb.php');

if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    //Kiểm tra username hoặc email có tồn tại hay chưa
    $stmt = $conn->prepare("SELECT * FROM web.user WHERE username=:username OR email=:email");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $count1 = $stmt->rowCount();
    if($count1 > 0) {
        //Nếu username hoặc email tồn tại thì thông báo lỗi và trở về trang đăng kí
        echo '<script type="text/javascript">';
        echo 'alert("Tài khoản đã tồn tại");';
        echo 'window.location.href="index.php?act=register";'; 
        echo '</script>';
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        //Kiểm tra dữ liệu vào
        //Kiểm tra định dạng email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //Kiểm tra độ dài tên đăng nhập
            if (strlen($username) >= 4 && strlen($username) <= 20) {
                //Kiểm tra độ dài mật khẩu
                if (strlen($password) >= 8) {
                    //Thực hiện thêm user vào CSDL
                    $stmt = $conn->prepare("INSERT INTO web.user (email, username, password) VALUES (:email, :username, :password)");
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':password', $password);
                    $stmt->execute();
                    echo '<script type="text/javascript">';
                    echo 'alert("Đăng ký thành công");';
                    echo 'window.location.href="index.php?act=login";'; 
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript">';
                    echo 'alert("Mật khẩu phải có độ dài từ 8 kí tự");';
                    echo ' window.history.back();'; 
                    echo '</script>';
                }
            } else {
                echo '<script type="text/javascript">';
                echo 'alert("Tên đăng nhập phải có độ dài từ 4 đến 20 kí tự");';
                echo ' window.history.back();'; 
                echo '</script>';
            }
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Email không hợp lệ");';
            echo ' window.history.back();'; 
            echo '</script>';
        }
    }
} else {
    echo '<script type="text/javascript">';
    echo 'alert("Lỗi");';
    echo 'window.location.href="index.php?act=home";'; 
    echo '</script>';
}
?>