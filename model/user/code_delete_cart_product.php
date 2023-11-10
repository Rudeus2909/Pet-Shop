<?php
    include "../apps/config/connectdb.php";

    if (isset($_SESSION["id_user"]) && isset($_POST["delete"])) {
        $id_product = $_POST["id_product"];

        $stmt = $conn->prepare('DELETE FROM web.cart WHERE id_product=:id_product');
        $stmt->bindParam(':id_product', $id_product);
        $stmt->execute();

        echo '<script type="text/javascript">';
        echo 'alert("Xóa sản phẩm khỏi giỏ hàng thành công");';
        echo 'window.history.back();'; 
        echo '</script>';
    }
?>