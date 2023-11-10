<?php
    include "../apps/config/connectdb.php";

    if (isset($_SESSION["id_user"]) && isset($_POST["update_role"])) {
        $id_user = $_POST["id_user"];
        $role = $_POST["role"];
        
        $stmt = $conn->prepare('UPDATE web.user SET role=:role WHERE id_user=:id_user');
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->execute();

        echo '<script type="text/javascript">';
        echo 'alert("Cập nhật vai trò của tài khoản thành công");';
        echo ' window.history.back();'; 
        echo '</script>';
    }
?>