<?php
    session_start();
    //Nếu tồn tại session giỏ hàng
    if(isset($_SESSION['cart'])){
        //Lấy id sp về
        if(isset($_GET['id'])) {
            array_splice($_SESSION['cart'],$_GET['id'],1);
        }else{
            unset($_SESSION['cart']);
            header("Location: index.php?act=product");
        }

        //Kiểm tra giỏ hàng
        if(count($_SESSION['cart']) > 0) header("Location: index.php?act=viewcart");
        else header("Location: index.php?act=product");
    }
?>