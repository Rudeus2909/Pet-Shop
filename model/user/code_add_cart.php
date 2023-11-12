<?php
    include "../apps/config/connectdb.php";

    if (isset($_SESSION["id_user"]) && isset($_POST["add_cart"])){
        $id_product = $_POST["id_product"];
        $id_user = $_SESSION["id_user"];
        $amount = $_POST["amount"];
        $i=0; $j=0;

        $stmt = $conn->prepare('SELECT * FROM web.product WHERE id_product=:id_product');
        $stmt->bindParam(':id_product', $id_product);
        $stmt->execute();

        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        $amount_remaining = $results["amount"];

        $stmt4 = $conn->prepare('SELECT * FROM web.cart');
        $stmt4->execute();
        $results1 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
        
        if ($amount > $amount_remaining) {
            echo '<script type="text/javascript">';
            echo 'alert("Số lượng sản phẩm còn lại trong kho không đủ đáp ứng. Xin vui lòng chọn lại");';
            echo 'window.history.back();'; 
            echo '</script>';
        } else {
            //Tìm và so sánh các sản phẩm trong giỏ hàng
            //Nếu đã tồn tại sản phẩm trong giỏ hàng thì cập nhật số lượng
            if ($results1 > 0) {
                foreach ($results1 as $product) {
                    if ($product["id_product"] == "$id_product"){
                        //Cập nhật số lượng
                        $amount_update = $product["amount"] + $amount;
                        $stmt2 = $conn->prepare('UPDATE web.cart SET amount=:amount_update WHERE id_product=:id_product');
                        $stmt2->bindParam(':amount_update', $amount_update);
                        $stmt2->bindParam(':id_product', $id_product);
                        $stmt2->execute();
                        echo '<script type="text/javascript">';
                        echo 'alert("Thêm sản phẩm vào giỏ hàng thành công");';
                        echo 'window.history.back();'; 
                        echo '</script>';
                        $j=1;
                        break;
                    }
                    $i++;
                }
            }

            //Nếu sản phẩm chưa tồn tại trong giỏ hàng thì thực hiện thêm vào giỏ
            //$sl không thay đổi, $j=1
            if ($j == 0) {
                $product_name = $_POST["product_name"];
                $picture = $_POST["picture"];
                $price = $_POST["price"];

                $stmt1 = $conn->prepare('INSERT INTO web.cart (id_user, id_product, product_name, amount, picture, price) VALUES (:id_user, :id_product, :product_name, :amount, :picture, :price)');
                $stmt1->bindParam(':id_user', $id_user);
                $stmt1->bindParam(':id_product', $id_product);
                $stmt1->bindParam(':product_name', $product_name);
                $stmt1->bindParam(':amount', $amount);
                $stmt1->bindParam(':picture', $picture);
                $stmt1->bindParam(':price', $price);
                $stmt1->execute();
                echo '<script type="text/javascript">';
                echo 'alert("Thêm sản phẩm vào giỏ hàng thành công");';
                echo 'window.history.back();'; 
                echo '</script>';
            }
        }
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Bạn cần phải đăng nhập");';
        echo 'window.history.back();'; 
        echo '</script>';
    }
?>