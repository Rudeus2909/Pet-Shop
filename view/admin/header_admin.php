<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style_admin.css">
    <title>Quản lý trang web</title>
</head>

<body>
    <header>
        <div class="wrapper">
            <div class="row">

                <div class="logo col-1">
                    <a href="#" id="logo">
                        <img src="img/logo.png" alt="">
                    </a>
                </div>

                <nav class="container col-9">
                    <ul id="main-menu">
                        <li><a href="index.php?act=admin">TRANG CHỦ</a></li>
                        <li><a href="#">QUẢN LÝ TÀI KHOẢN</a>
                            <ul class="sub-menu">
                                <li><a href="index.php?act=account_manage">HIỂN THỊ TÀI KHOẢN</a></li>
                                <li><a href="index.php?act=admin_info">CHỈNH SỬA THÔNG TIN</a></li>
                            </ul>
                        </li>
                        <li><a href="#">QUẢN LÝ SẢN PHẨM</a>
                            <ul class="sub-menu">
                                <li><a href="index.php?act=fetch_product">HIỂN THỊ SẢN PHẨM</a></li>
                                <li><a href="index.php?act=add_product">THÊM SẢN PHẨM</a></li>
                            </ul>
                        </li>
                        <li><a href="#">QUẢN LÝ ĐƠN HÀNG</a></li>
                        <li><a href="index.php?act=signout">ĐĂNG XUẤT</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
</body>

</html>