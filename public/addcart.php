<?php
    session_start();
    ob_start();

    if(!isset($_SESSION['cart'])) $_SESSION['cart']=array();

    if(isset($_POST['addtocart']) && ($_POST['addtocart'])) {
        $id = $_POST['id'];
        $product_name = $_POST['product_name'];
        $img = $_POST['img'];
        $count = $_POST['count'];
        $sl=1; $i=0; $j=0;

        //Tìm và so sánh các sản phẩm trong giỏ hàng
        if(isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0)) {
            foreach($_SESSION['cart'] as $sp) {
                if($sp[0] == $id){
                    //Cập nhật mới số lượng
                    $sl+=$sp[4];
                    $j=1;
                    //Cập nhật số lượng mới vào giỏ hàng
                    $_SESSION['cart'][$i][4]=$sl;
                    break;
                }
                $i++;
            }
        }

        //Khi $sl không thay đổi thì thêm mới sản phẩm vào giỏ
        if($j == 0){
            //Tạo mảng
            $sp=array($id,$product_name,$img,$count,$sl);
            array_push($_SESSION['cart'],$sp);
        }

        //Chuyển trang
        header("Location: index.php?act=product");
    }
?>