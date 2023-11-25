<?php
    include "../apps/config/connectdb.php";

    //Kiểm tra xem người sử dụng có phải admin hay không?
    if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {

        //Thay đổi thông tin tài khoản
        if (isset($_POST['send']) && isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            //Thực hiện chỉnh sửa
            $stmt = $conn->prepare('UPDATE web.user SET name_user=:name, address=:address, phone=:phone, email=:email WHERE username=:username');
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            //Thông báo thành công
            echo '<script type="text/javascript">';
            echo 'alert("Thay đổi thông tin thành công");';
            echo 'window.location.href="index.php?act=admin_info";'; 
            echo '</script>';
        }

        //Đổi mật khẩu
        if (isset($_POST['change']) && isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $current_pass = $_POST['current-pass'];
 
            //Kiểm tra mật khẩu hiện tại có trùng khớp hay không
            $stmt1 = $conn->prepare("SELECT * FROM web.user WHERE username=:username AND password=:password");
            $stmt1->bindParam(':username', $username);
            $stmt1->bindParam(':password', $current_pass);
            $stmt1->execute();

            if ($result = $stmt1->fetchAll(PDO::FETCH_OBJ)) {
                $new_pass = $_POST['new-pass'];
                $re_pass = $_POST['re-pass'];

                //Kiểm tra độ dài mật khẩu mới
                if (strlen($new_pass) >= 8) {
                    //Kiểm tra nhập lại mật khẩu có trùng khớp hay không
                    if ($new_pass != $re_pass) {
                        // Xuất thông báo và trở về trang admin_info
                        echo '<script type="text/javascript">';
                        echo 'alert("Nhập lại mật khẩu không chính xác");';
                        echo ' window.history.back();'; 
                        echo '</script>';
                    } else {
                        // Thực hiện thay đổi mật khẩu
                        $stmt2 = $conn->prepare('UPDATE web.user SET password=:new_pass WHERE username=:username');
                        $stmt2->bindParam(':new_pass', $new_pass);
                        $stmt2->bindParam(':username', $username);
                        $stmt2->execute();
                        echo '<script type="text/javascript">';
                        echo 'alert("Thay đổi mật khẩu thành công");';
                        echo ' window.history.back();'; 
                        echo '</script>';
                    }
                } else {
                    // Xuất thông báo và trở về trang admin_info
                    echo '<script type="text/javascript">';
                    echo 'alert("Mật khẩu mới phải có độ dài từ 8 kí tự");';
                    echo ' window.history.back();'; 
                    echo '</script>';
                }
            } else {
                echo '<script type="text/javascript">';
                echo 'alert("Mật khẩu hiện tại không chính xác");';
                echo ' window.history.back();'; 
                echo '</script>';
            }
     }
    } else {
        //Nếu không phải admin thì không cho phép truy cập
        echo '<script type="text/javascript">';
        echo 'alert("Bạn không có quyền truy cập");';
        echo 'window.location.href="index.php?act=home";'; 
        echo '</script>';
    }
?>