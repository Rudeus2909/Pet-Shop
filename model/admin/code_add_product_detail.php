<?php
    include "../apps/config/connectdb.php";

    if (isset($_SESSION["id_user"]) && isset($_POST["add_detail"])){
    //Lấy các biến từ phương thức POST của form add_product_detail
    $id_product = $_POST["id_product"];
    $detail_description = $_POST["detail_description"];
    //Kiểm tra danh mục của id_product có phải là Phụ kiện hay không
    //Fetch dữ liệu trong CSDL
    $stmt1 = $conn->prepare('SELECT * FROM web.product JOIN web.category ON web.product.id_category=web.category.id_category
                                                            WHERE id_product=:id_product AND web.product.id_category="3"');
    $stmt1->bindParam('id_product', $id_product);
    $stmt1->execute();
    $results1 = $stmt1->fetchAll(PDO::FETCH_OBJ);
    //Dùng hàm count() để đếm số dòng dữ liệu
    $count1 = count($results1);
    //Nếu sản phẩm là thú cưng thì hiển thị form thêm chi tiết thú cưng 
    if ($count1 == 0){
        $breed = $_POST["breed"];
        $color = $_POST["color"];
        $gender = $_POST["gender"];
        $age = $_POST["age"];
        $vaccination = $_POST["vaccination"];
        $health_condition = $_POST["health_condition"];
        
        //Thực hiện thêm vào CSDL
        $stmt = $conn->prepare('INSERT INTO web.product_detail (detail_description, breed, color, gender, age, vaccination, health_condition, id_product)
                            VALUES (:detail_description, :breed, :color, :gender, :age, :vaccination, :health_condition, :id_product)');
        $stmt->bindParam(':detail_description', $detail_description);
        $stmt->bindParam(':breed', $breed);
        $stmt->bindParam(':color', $color);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':vaccination', $vaccination);
        $stmt->bindParam(':health_condition', $health_condition);
        $stmt->bindParam(':id_product', $id_product);
        $stmt->execute();
        
        //Xuất thông báo thành công và trở về trang hiển thị sản phẩm
        echo '<script type="text/javascript">';
        echo 'alert("Thêm chi tiết thành công");';
        echo 'window.location.href="index.php?act=fetch_product";'; 
        echo '</script>';
    }
    //Nếu sản phẩm là phụ kiện thì hiển thị form thêm chi tiết phụ kiện 
    else {
        //Thêm vào bảng product_detail
        $stmt2 = $conn->prepare('INSERT INTO web.product_detail (detail_description, id_product) VALUES (:detail_description, :id_product)');
        $stmt2->bindParam(':detail_description', $detail_description);
        $stmt2->bindParam(':id_product', $id_product);
        $stmt2->execute();

        //Xuất thông báo thành công và trở về trang hiển thị sản phẩm
        echo '<script type="text/javascript">';
        echo 'alert("Thêm chi tiết thành công");';
        echo 'window.location.href="index.php?act=fetch_product";'; 
        echo '</script>';
    }
}
?>