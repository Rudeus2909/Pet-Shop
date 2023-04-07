<?php
session_start();
include('../apps/config/connectdb.php');

if(isset($_POST['Signup'])) {
    $username = $_POST['username'];

    $stmt = $pdo->prepare("SELECT * FROM shop.taikhoan WHERE username=:username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $count1 = $stmt->rowCount();
    if($count1 > 0) {
        echo "<script>alert('Tài khoản đã tồn tại!!!')</script>";
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $stmt = $pdo->prepare("INSERT INTO shop.taikhoan (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $user_id = $pdo->lastInsertId();

        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $stmt = $pdo->prepare("INSERT INTO shop.khachhang (ma_khachhang, hotenkhachhang, diachi, sdt, email) VALUES (:user_id, :fullname, :address, :phone, :email)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam('fullname', $fullname);
        $stmt->bindParam('address', $address);
        $stmt->bindParam('phone', $phone);
        $stmt->bindParam('email', $email);
        $stmt->execute();
        echo "<script>alert('Đăng ký thành công')</script>";
        header("Location: login.php");
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Đăng ký</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">

                <div class="card">
                    <div class="card-header">
                        <h2>Đăng ký</h2>
                    </div>
                    <div class="card-body">
                        <form id="signupForm" method="post" class="form-horizontal" action="index.php?act=register">
                            
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tên đăng nhập</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="username" placeholder="Tên đăng nhập" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Mật khẩu</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Họ và tên</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="fullname" placeholder="Họ và tên" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Địa chỉ</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="address" placeholder="Địa chỉ" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">SĐT</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="phone" placeholder="Số điện thoại" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="email" placeholder="Email" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-1 offset-sm-4">
                                    <input type="submit" class="btn btn-primary" name="Signup" value="Đăng Ký">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>