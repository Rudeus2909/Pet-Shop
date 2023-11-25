<?php
    include "../apps/config/connectdb.php";

    //Kiểm tra xem người sử dụng có phải user hay không?
    if (isset($_SESSION["id_user"]) && isset($_SESSION["role"]) && $_SESSION["role"] == "user") {

        if (isset($_POST["update"])) {
            $id_product = $_POST["id_product"];
            $amount = $_POST["amount"];

            $stmt = $conn->prepare('UPDATE web.cart SET amount=:amount WHERE id_product=:id_product');
            $stmt->bindParam(':amount', $amount);
            $stmt->bindParam('id_product', $id_product);
            $stmt->execute();

            echo '<script type="text/javascript">';
            echo 'alert("Cập nhật thành công");';
            echo 'window.location.href="index.php?act=account_manage"'; 
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