<?php
    include "../apps/config/connectdb.php";

    //Kiểm tra xem người sử dụng có phải admin hay không?
    if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin"){
        //Kiểm tra sự tồn tại của nút xóa
        if (isset($_POST["delete_product"])) {
            $id_product = $_POST["id_product"];
            
            //Nếu sản phẩm còn đang tồn tại trong giỏ hàng của khách hàng thì không thể xóa
            $stmt = $conn->prepare("SELECT * FROM web.cart WHERE id_product=:id_product");
            $stmt->bindParam(':id_product', $id_product);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_OBJ);
            $count = count($results);
            if ($count > 0) {
                echo '<script type="text/javascript">';
                echo 'alert("Bạn không thể xóa vì sản phẩm này đang tồn tại trong giỏ hàng của khách hàng");';
                echo 'window.history.back();'; 
                echo '</script>';
            }
            //Ngược lại 
            else {
                //Thực hiện xóa chi tiết sản phẩm trước
                $stmt1 = $conn->prepare("DELETE FROM web.product_detail WHERE id_product=:id_product");
                $stmt1->bindParam(':id_product', $id_product);
                $stmt1->execute();

                //Sau đó xóa sản phẩm đó khỏi cửa hàng
                $stmt2 = $conn->prepare("DELETE FROM web.product WHERE id_product=:id_product");
                $stmt2->bindParam(':id_product', $id_product);
                $stmt2->execute();

                //Xuất thông báo thành công
                echo '<script type="text/javascript">';
                echo 'alert("Xóa sản phẩm thành công");';
                echo 'window.history.back();'; 
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