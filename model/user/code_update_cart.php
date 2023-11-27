<?php
    include "../apps/config/connectdb.php";

    //Kiểm tra xem người sử dụng có phải user hay không?
    if (isset($_SESSION["id_user"]) && isset($_SESSION["role"]) && $_SESSION["role"] == "user") {

        //Kiểm tra sự tồn tại của nút "Cập nhật"
        if (isset($_POST["update"])) {
            $id_product = $_POST["id_product"];
            $amount = $_POST["amount"];

            //Lấy thông tin số lượng trong kho dựa trên ID sản phẩm
            $stmt1 = $conn->prepare('SELECT * FROM web.product WHERE id_product=:id_product');
            $stmt1->bindParam(':id_product', $id_product);
            $stmt1->execute();
            $results1 = $stmt1->fetch(PDO::FETCH_ASSOC);
            //Gán số lượng sản phẩm vào biến
            $amount_remaining = $results1["amount"];

            //Nếu số lượng thêm vào giỏ lớn hơn số lượng trong kho
            if ($amount > $amount_remaining) {
                //Xuất thông báo
                echo '<script type="text/javascript">';
                echo 'alert("Số lượng sản phẩm còn lại trong kho không đủ đáp ứng. Xin vui lòng chọn lại");';
                echo 'window.location.href="index.php?act=cart";'; 
                echo '</script>';
            }
            //Ngược lại
            else{
                //Cập nhật số lượng vào CSDL
                $stmt = $conn->prepare('UPDATE web.cart SET amount=:amount WHERE id_product=:id_product');
                $stmt->bindParam(':amount', $amount);
                $stmt->bindParam('id_product', $id_product);
                $stmt->execute();

                //Xuất thông báo thành công
                echo '<script type="text/javascript">';
                echo 'alert("Cập nhật thành công");';
                echo 'window.location.href="index.php?act=cart"'; 
                echo '</script>';
            }     
        }
    } else {
        //Nếu không phải user thì xuất thông báo
        echo '<script type="text/javascript">';
        echo 'alert("Bạn không phải người dùng thành viên");';
        echo 'window.history.back();'; 
        echo '</script>';
    }
?>