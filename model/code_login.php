<?php
include('../apps/config/connectdb.php');

if(isset($_POST['signin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Truy xuất CSDL
    $_SESSION['username'] = $username;
    $stmt = $conn->prepare('SELECT * FROM web.user WHERE username=:username AND password=:password');
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count > 0){
        $row = $stmt->fetch();
        $_SESSION['id_user'] = $row['id_user'];
        //Kiểm tra vai trò của user
        if($row["role"]=="admin"){
            //Nếu là admin thì chuyển hướng đến trang quản lý
            header("Location:index.php?act=admin");
            exit();
        }
        elseif($row["role"]=="user"){
            //Nếu là người dùng thành viên thì chuyển hướng đến trang chủ
            header("Location:index.php");
            exit();
        }
    } else {
        echo "<script>alert('Thông tin đăng nhập không chính xác')</script>";
        unset($_SESSION['username']);
    }
}
?>