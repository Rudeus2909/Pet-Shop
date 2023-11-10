<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>Cute Pet</title>
</head>
<body>
                <div style="background-color: yellow;">
                    <marquee behavior="alternative" direction="left">
                        <strong>
                            MIỄN PHÍ GIAO HÀNG VỚI HÓA ĐƠN TỪ 3.000.000 VNĐ <span>LIÊN HỆ ĐẶT HÀNG: 0886026861</span>
                        </strong>
                    </marquee>
                </div>
    <header>
        
                    <div class="logo">
                        <img src="img/logo1.png" class="logo" alt="">
                    </div>
                    <nav>
                        <ul>
                            <li>
                                <i class="fa-solid fa-house"></i>
                                <a href="index.php?act=home">Trang chủ</a>
                            </li>
                            <li>
                                <i style="margin-left: 10px;" class="fa-solid fa-shop"></i>
                                <a href="index.php?act=product">Sản phẩm</a>
                            </li>
                            <li>
                                <i style="margin-left: 10px;" class="fa-solid fa-cart-shopping"></i>
                                <a href="index.php?act=viewcart">Giỏ hàng</a>
                            </li>
                            <?php
                                if(isset($_SESSION['username'])) {
                                    echo '<li>
                                            <i style="margin-left: 10px;" class="fa-solid fa-user"></i>
                                            <a href="index.php?act=userinfo">'.$_SESSION['username'].'</a>
                                        </li>';
                                    echo '<li>
                                                <i style="margin-left: 10px;" class="fa-solid fa-arrow-right-from-bracket"></i>
                                                <a href="index.php?act=logout">Đăng xuất</a>
                                            </li>';
                                }else{
                                    echo '<li>
                                            <i class="fa-solid fa-user" style="margin-left: 10px;" onclick="click()"></i>
                                            <a href="index.php?act=register" class="a">Đăng ký</a>
                                            </li>
                                        <li>
                                            <i style="margin-left: 10px;" class="fa-solid fa-user"></i>
                                            <a href="index.php?act=login" class="a">Đăng nhập</a>
                                        </li>';
                                }
                            ?>
                        </ul>
        </nav>
    </header>
</body>
</html>