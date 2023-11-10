<?php
    include "../apps/config/connectdb.php";

    if (isset($_SESSION["id_user"]) && isset($_POST["update"])) {
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
?>