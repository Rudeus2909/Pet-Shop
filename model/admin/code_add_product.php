<?php
    include "../apps/config/connectdb.php";

    //Kiểm tra xem người sử dụng có phải admin hay không?
    if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin"){

        if (isset($_POST['add']) && isset($_FILES['image'])) {
            $product_name = $_POST['product_name'];
        
            //Truy xuất CSDL
            $stmt = $conn->prepare('SELECT * FROM web.product WHERE product_name=:product_name');
            $stmt->bindParam(':product_name', $product_name);
            $stmt->execute();
            $count = $stmt->rowCount();
        
            //Kiểm tra sản phẩm đã tồn tại hay chưa
            if ($count > 0){
                echo "<srcipt>alert('Mã sản phẩm đã tồn tại')</script>";
            } else {
                $price = $_POST['price'];
                $amount = $_POST['amount'];
                $category = $_POST['category'];
                $type = $_POST['type'];

                //Xử lí hình ảnh
                $picture = file_get_contents($_FILES['image']['tmp_name']);

                //Thêm vào CSDL
                $stmt1 = $conn->prepare("INSERT INTO web.product (product_name, price, amount, picture, id_category, id_type) VALUES (:product_name, :price, :amount, :picture, :id_category, :id_type)");
                $stmt1->bindParam(':product_name', $product_name);
                $stmt1->bindParam(':price', $price);
                $stmt1->bindParam(':amount', $amount);
                $stmt1->bindParam(':picture', $picture);
                $stmt1->bindParam(':id_category', $category);
                $stmt1->bindParam(':id_type', $type);
                $stmt1->execute();

                echo '<script type="text/javascript">';
                echo 'alert("Thêm sản phẩm thành công");';
                echo 'window.location.href="index.php?act=add_product";'; 
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