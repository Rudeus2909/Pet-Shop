<?php
    include "../apps/config/connectdb.php";
    //Kiểm tra xem người sử dụng có phải user hay không?
    if (isset($_SESSION["id_user"]) && isset($_SESSION["role"]) && $_SESSION["role"] == "user") {

        if (isset($_POST["order"])) {
            $id_user = $_SESSION["id_user"];

            //Lấy các biến từ form đặt hàng
            $order_owner = $_POST["order_owner"];
            $address = $_POST["address"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            $total = $_POST["total"];

            //Lấy thời gian đặt hàng
            $order_time = date('Y-m-d H:i:s');

            //Tạo mã đơn hàng (ngẫu nhiên)
            function generateOrderCode($length = 8) {
                $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $code = '';
                for ($i = 0; $i < $length; $i++) {
                $code .= $characters[rand(0, strlen($characters) - 1)];
                }
                return $code;
            }
            $order_code = generateOrderCode();

            //Thêm đơn hàng
            $stmt3 = $conn->prepare('INSERT INTO web.orders (id_user, order_owner, address, phone, email, order_time, order_code, order_total) VALUES (:id_user, :order_owner, :address, :phone, :email, :order_time, :order_code, :order_total)');
            $stmt3->bindParam(':id_user', $id_user);
            $stmt3->bindParam(':order_owner', $order_owner);
            $stmt3->bindParam(':address', $address);
            $stmt3->bindParam(':phone', $phone);
            $stmt3->bindParam(':email', $email);
            $stmt3->bindParam(':order_time', $order_time);
            $stmt3->bindParam(':order_code', $order_code);
            $stmt3->bindParam(':order_total', $total);
            $stmt3->execute();

            //Lấy id đơn hàng vừa thêm
            $id_order = $conn->lastInsertId();

            //Lấy từng sản phẩm trong giỏ hàng
            $stmt1 = $conn->prepare('SELECT * FROM web.cart WHERE id_user=:id_user');
            $stmt1->bindParam(':id_user', $id_user);
            $stmt1->execute();
            $results = $stmt1->fetchAll(PDO::FETCH_OBJ);

            //Thêm vào chi tiết đơn hàng
            foreach ($results as $product) {
                $stmt = $conn->prepare('INSERT INTO web.order_detail (id_order ,id_user, id_product, product_name, amount, picture, price)
                                VALUES (:id_order, :id_user, :id_product, :product_name, :amount, :picture, :price)');
                $stmt->bindParam(':id_order', $id_order);
                $stmt->bindParam(':id_user', $id_user);
                $stmt->bindParam(':id_product', $product->id_product);
                $stmt->bindParam(':product_name', $product->product_name);
                $stmt->bindParam(':amount', $product->amount);
                $stmt->bindParam(':picture', $product->picture);
                $stmt->bindParam(':price', $product->price);
                $stmt->execute();

                echo '<script type="text/javascript">';
                echo 'alert("Đặt hàng thành công");';
                echo 'window.location.href="index.php?act=user_info";'; 
                echo '</script>';

                //Xóa các sản phẩm trên khỏi giỏ hàng
                $stmt2 = $conn->prepare('DELETE FROM web.cart WHERE id_product=:id_product');
                $stmt2->bindParam(':id_product', $product->id_product);
                $stmt2->execute();
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