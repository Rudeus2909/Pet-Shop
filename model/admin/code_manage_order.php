<?php
    include "../apps/config/connectdb.php";

    //Kiểm tra xem người sử dụng có phải admin hay không?
    if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {

        //Kiểm tra sự tồn tại của nút "Xác nhận"
        if (isset($_POST["confirm"])) {
            $order_status = $_POST["order_status"];
            $id_order = $_POST["id_order"];

            //Cập nhật trạng thái đơn hàng vào CSDL
            $stmt = $conn->prepare('UPDATE web.orders SET order_status=:order_status WHERE id_order=:id_order');
            $stmt->bindParam(':order_status', $order_status);
            $stmt->bindParam(':id_order', $id_order);
            $stmt->execute();

            //Nếu trạng thái đơn hàng là "Đã xác nhận" thì thực hiện trừ số lượng sản phẩm trong CSDL
            if ($order_status == "Đã xác nhận"){
                //Lấy ID các sản phẩm của đơn hàng
                $stmt1 = $conn->prepare('SELECT * FROM web.order_detail WHERE id_order=:id_order');
                $stmt1->bindParam(':id_order', $id_order);
                $stmt1->execute();
                while ($results = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                    $id_product = $results["id_product"];
                    $order_amount = $results["amount"];

                    //Lấy số lượng trong kho
                    $stmt2 = $conn->prepare('SELECT * FROM web.product WHERE id_product=:id_product');
                    $stmt2->bindParam(':id_product', $id_product);
                    $stmt2->execute();
                    $results1 = $stmt2->fetch(PDO::FETCH_ASSOC);

                    //Trừ số lượng sản phẩm trong kho
                    $current_amount = $results1["amount"] - $order_amount;
                    
                    //Cập nhật CSDL
                    $stmt3 = $conn->prepare('UPDATE web.product SET amount=:current_amount WHERE id_product=:id_product');
                    $stmt3->bindParam(':current_amount', $current_amount);
                    $stmt3->bindParam(':id_product', $id_product);
                    $stmt3->execute();
                }
            }
            //Xuất thông báo thành công
            echo '<script type="text/javascript">';
            echo 'alert("Cập nhật tình trạng đơn hàng thành công");';
            echo 'window.history.back();'; 
            echo '</script>';
        }

    } else {
        //Nếu không phải admin thì không cho phép truy cập
        echo '<script type="text/javascript">';
        echo 'alert("Bạn không có quyền truy cập");';
        echo 'window.location.href="index.php?act=home";'; 
        echo '</script>';
}
?>