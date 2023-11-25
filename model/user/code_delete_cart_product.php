<?php
    include "../apps/config/connectdb.php";

    //Kiểm tra xem người sử dụng có phải user hay không?
    if (isset($_SESSION["id_user"]) && isset($_SESSION["role"]) && $_SESSION["role"] == "user") {

        if (isset($_POST["delete"])) {
            $id_product = $_POST["id_product"];

            $stmt = $conn->prepare('DELETE FROM web.cart WHERE id_product=:id_product');
            $stmt->bindParam(':id_product', $id_product);
            $stmt->execute();

            echo '<script type="text/javascript">';
            echo 'alert("Xóa sản phẩm khỏi giỏ hàng thành công");';
            echo 'window.history.back();'; 
            echo '</script>';
        }
    } else {
        //Nếu không phải user thì xuất thông báo
        echo '<script type="text/javascript">';
        echo 'alert("Bạn không phải người dùng thành viên");';
        echo 'window.history.back();'; 
        echo '</script>';
    }
?>