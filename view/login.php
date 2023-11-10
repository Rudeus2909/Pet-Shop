<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="css/style_login_register.css">
</head>
<body class="body_login_register">
    <div class="wrapper_login">
        <div class="form-box login">
            <h2>Đăng nhập</h2>
            <form action="index.php?act=code_login" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-circle"></ion-icon></span>
                    <input type="text" required name="username">
                    <label>Tên đăng nhập</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" required name="password">
                    <label>Mật khẩu</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">Ghi nhớ đăng nhập</label>
                    <a href="#">Quên mật khẩu?</a>
                </div>
                <input type="submit" class="btn" value="Đăng nhập" name="signin">
                <div class="login-register">
                    <p>Chưa có tài khoản? <a href="index.php?act=register" class="register-link">Đăng ký</a></p>
                </div>
            </form>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>