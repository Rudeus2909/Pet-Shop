<?php
    include "../apps/config/connectdb.php";

    //Kiểm tra xem người sử dụng có phải user hay không?
    if (isset($_SESSION["id_user"]) && isset($_SESSION["role"]) && $_SESSION["role"] == "user") {

        //Kiểm tra sự tồn tại của nút "Hủy đơn hàng"
        if (isset($_POST["cancel_order"])) {
            $id_order = $_POST["id_order"];
            
            //Cập nhật trạng thái đơn hàng vào CSDL
            $stmt = $conn->prepare('UPDATE web.orders SET order_status = "Đã hủy" WHERE id_order=:id_order');
            $stmt->bindParam(':id_order', $id_order);
            $stmt->execute();

            //Xuất thông báo
            echo '<script type="text/javascript">';
            echo 'alert("Hủy đơn hàng thành công");';
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