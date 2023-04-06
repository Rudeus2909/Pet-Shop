<?php
session_start();
include('../apps/config/connectdb.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT * FROM shop.taikhoan WHERE username=:username AND password=:password');
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count > 0){
        $row = $stmt->fetch();
        if($row["role"]=="0"){
            header("Location: admin.php");
        }
        elseif($row["role"]=="1"){
            header("Location: index.php");
            exit;
        }
    } else {
        echo "Thông tin đăng nhập không chính xác";
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
    <title>Đăng nhập</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">

                <div class="card">
                    <div class="card-header">
                        <h2>Đăng nhập</h2>
                    </div>
                    <div class="card-body">
                        <form id="signinForm" method="post" class="form-horizontal" action="index.php?act=login">
                            
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="tendangnhap">Tên đăng nhập</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="username" placeholder="Tên đăng nhập" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="password">Mật khẩu</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-5 offset-sm-4">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Đăng nhập">
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