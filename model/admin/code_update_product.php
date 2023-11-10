<?php
    include "../apps/config/connectdb.php";

    if (isset($_SESSION["id_user"]) && isset($_POST["update_product"]) && isset($_FILES['picture'])) {
        $id_product = $_POST["id_product"];
        $product_name = $_POST["product_name"];
        $price = $_POST["price"];
        $amount = $_POST["amount"];
        $detail_description = $_POST["detail_description"];

        //Xử lí hình ảnh
        $picture = file_get_contents($_FILES['picture']['tmp_name']);

        //Cập nhật CSDL
        //Cập nhật bảng product
        $stmt = $conn->prepare('UPDATE web.product SET product_name=:product_name,
                                                            price=:price, amount=:amount, picture=:picture WHERE id_product=:id_product');
        $stmt->bindParam(':product_name', $product_name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':picture', $picture);
        $stmt->bindParam(':id_product', $id_product);
        $stmt->execute();

        //Kiểm tra danh mục của id_product có phải là Phụ kiện hay không
        //Fetch dữ liệu trong CSDL
        $stmt3 = $conn->prepare('SELECT * FROM web.product JOIN web.category ON web.product.id_category=web.category.id_category
                                                            WHERE id_product=:id_product AND web.product.id_category="3"');
        $stmt3->bindParam('id_product', $id_product);
        $stmt3->execute();
        $results = $stmt3->fetchAll(PDO::FETCH_OBJ);
        //Dùng hàm count() để đếm số dòng dữ liệu
        $count = count($results);
        //Nếu sản phẩm là thú cưng thì cập nhật chi tiết thú cưng 
        if ($count == 0){
            $breed = $_POST["breed"];
            $color = $_POST["color"];
            $gender = $_POST["gender"];
            $age = $_POST["age"];
            $vaccination = $_POST["vaccination"];
            $health_condition = $_POST["health_condition"];

            //Cập nhật bảng product_detail
            $stmt1 = $conn->prepare('UPDATE web.product_detail SET breed=:breed, color=:color, gender=:gender, age=:age, 
                                            vaccination=:vaccination, health_condition=:health_condition, detail_description=:detail_description
                                            WHERE id_product=:id_product');
            $stmt1->bindParam(':breed', $breed);
            $stmt1->bindParam(':color', $color);
            $stmt1->bindParam(':gender', $gender);
            $stmt1->bindParam(':age', $age);
            $stmt1->bindParam(':vaccination', $vaccination);
            $stmt1->bindParam(':health_condition', $health_condition);
            $stmt1->bindParam(':detail_description', $detail_description);
            $stmt1->bindParam(':id_product', $id_product);
            $stmt1->execute();

            //Xuất thông báo thành công và trở về trang hiển thị sản phẩm
            echo '<script type="text/javascript">';
            echo 'alert("Cập nhật sản phẩm thành công");';
            echo 'window.location.href="index.php?act=fetch_product";'; 
            echo '</script>';
    }
    //Nếu sản phẩm là phụ kiện thì cập nhật chi tiết phụ kiện
    else {
        //Cập nhật bảng product_detail
        $stmt2 = $conn->prepare('UPDATE web.product_detail SET detail_description=:detail_description WHERE id_product=:id_product');
        $stmt2->bindParam(':detail_description', $detail_description);
        $stmt2->bindParam(':id_product', $id_product);
        $stmt2->execute();

        //Xuất thông báo thành công và trở về trang hiển thị sản phẩm
        echo '<script type="text/javascript">';
        echo 'alert("Cập nhật sản phẩm thành công");';
        echo 'window.location.href="index.php?act=fetch_product";'; 
        echo '</script>';
    }
}
?>