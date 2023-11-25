<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Cute Pet</title>
</head>

<body>
    <header>
        <div class="wrapper">
            <div class="banner">
                <a href="#"><img src="img/banner.jpg" alt="CutePetShop.com"></a>
            </div>
            <div class="row">
                <div class="logo col-2">
                    <a href="#" id="logo">
                        <img src="img/logo.png" alt="CutePetShop.com">
                    </a>
                </div>
                <nav class="container col-9">
                    <ul id="main-menu">
                        <li><a href="index.php">TRANG CHỦ</a></li>
                        <li><a href="#">CHÓ CẢNH</a>
                            <ul class="sub-menu">
                                <li><a href="index.php?act=als">ALASKA</a></li>
                                <li><a href="index.php?act=pd">POODLE</a></li>
                                <li><a href="index.php?act=sm">SAMOYED</a></li>
                                <li><a href="index.php?act=akt">AKITA INU</a></li>
                                <li><a href="index.php?act=gd">GOLDEN RETRIEVER</a></li>
                            </ul>
                        </li>
                        <li><a href="#">MÈO CẢNH</a>
                            <ul class="sub-menu">
                                <li><a href="index.php?act=bsh">ANH LÔNG NGẮN</a></li>
                                <li><a href="index.php?act=sim">XIÊM</a></li>
                                <li><a href="index.php?act=ps">BA TƯ</a></li>
                                <li><a href="index.php?act=blh">ANH LÔNG DÀI</a></li>
                                <li><a href="index.php?act=rd">RAGDOLL</a></li>
                            </ul>
                        </li>
                        <li><a href="#">PHỤ KIỆN</a>
                            <ul class="sub-menu">
                                <li><a href="index.php?act=food">THỨC ĂN</a></li>
                                <li><a href="index.php?act=toy">ĐỒ CHƠI</a></li>
                                <li><a href="index.php?act=bp">BALO</a></li>
                            </ul>
                        </li>
                        <li><a href="index.php?act=about_us">GIỚI THIỆU</a></li>
                        <?php
                            if (isset($_SESSION['username'])){
                                echo '<li><a style="text-transform: uppercase;" href="index.php?act=user_info">'.$_SESSION['username'].'</a></li>';
                                echo '<li><a href="index.php?act=signout">ĐĂNG XUẤT</a></li>';
                            }else{
                                echo '<li><a href="index.php?act=register">ĐĂNG KÝ</a></li>';
                                echo '<li><a href="index.php?act=login">ĐĂNG NHẬP</a></li>';
                            }
                        ?>
                    </ul>
                </nav>
                <div class="col-1">
                    <div class="icons">
                        <li><a href="index.php?act=cart"><i class="fas fa-shopping-cart"></i></a></li>
                        <div class="fas fa-search" id="search"></div>
                    </div>
                </div>
                <form action="index.php?act=search" method="post" id="search-box">
                    <input type="text" id="search-text" name="keyword" require placeholder="Tìm kiếm...">
                    <button id="search-btn" name="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
        <script>
        let searchForm = document.querySelector('#search-box');

        document.querySelector('#search').onclick = () => {
            searchForm.classList.toggle('active');
        }
        </script>
    </header>
</body>

</html>