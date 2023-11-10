<?php
    include "../apps/config/connectdb.php";

    //Lấy id_product bằng phương thức GET
    if (isset($_GET["id"])) {
        $id_product = $_GET["id"];
    }

    //Kiểm tra trong bảng product_detail xem có chi tiết sản phẩm hay chưa
    //Xuất dữ liệu trong bảng product_detail dựa trên id_product
    $stmt = $conn->prepare('SELECT * FROM web.product_detail WHERE id_product=:id_product');
    $stmt->bindParam(':id_product', $id_product);
    $stmt->execute();
    //Fetch dữ liệu theo row
    $results = $stmt->fetchAll(PDO::FETCH_OBJ);
    //Dùng hàm count() để đếm số dòng dữ liệu
    $count = count($results);
    //Nếu chưa có chi tiết sản phẩm thì hiển thị trang thêm chi tiết sản phẩm
    if ($count == 0){
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="css/manage_product.css">
</head>

<body>
    <div class="title">
        <b></b>
        <h2>THÊM CHI TIẾT SẢN PHẨM</h2>
        <b></b>
    </div>
    <form action="index.php?act=code_add_product_detail" method="post">
        <input type="hidden" name="id_product" value=<?=$id_product?>>
        <div class="row">
            <div class="col-6">
                <div class="form-floating mb-3">
                    <input type="text" name="breed" class="form-control" required id="floatingInput" placeholder=" ">
                    <label for="floatingInput">Giống loài</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="color" class="form-control" required id="floatingPassword" placeholder=" ">
                    <label for="floatingInput">Màu sắc</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="gender" class="form-control" required id="floatingInput" placeholder=" ">
                    <label for="floatingInput">Giới tính</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="age" class="form-control" required id="floatingInput" placeholder=" ">
                    <label for="floatingInput">Tuổi</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="vaccination" class="form-control" required id="floatingInput"
                        placeholder=" ">
                    <label for="floatingInput">Tiêm phòng</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="health_condition" class="form-control" required id="floatingInput"
                        placeholder=" ">
                    <label for="floatingInput">Tình trạng sức khỏe</label>
                </div>
            </div>
            <div class="col-6">
                <div class="form-floating">
                    <textarea class="form-control" name="detail_description" required placeholder=" "
                        id="floatingTextarea" style="height: 430px;"></textarea>
                    <label for="floatingTextarea">Mô tả</label>
                </div>
            </div>
        </div>
        <div class="add_detail_btn">
            <div>
                <button type="button" class="btn btn-secondary btn-lg"><a href="index.php?act=fetch_product">Trở
                        về</a></button>
            </div>
            <div>
                <button type="submit" name="add_detail" class="btn btn-primary btn-lg">Thêm chi tiết</button>
            </div>
        </div>
    </form>
</body>

</html>
<?php }
    //Nếu sản phẩm là phụ kiện thì hiển thị form thêm chi tiết phụ kiện
    else { ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="css/manage_product.css">
</head>

<body>
    <div class="title">
        <b></b>
        <h2>THÊM CHI TIẾT SẢN PHẨM</h2>
        <b></b>
    </div>
    <form action="index.php?act=code_add_product_detail" method="post">
        <input type="hidden" name="id_product" value=<?=$id_product?>>
        <div class="form-floating">
            <textarea class="form-control" name="detail_description" required placeholder=" " id="floatingTextarea"
                style="height: 200px;"></textarea>
            <label for="floatingTextarea">Mô tả</label>
        </div>
        <div class="add_detail_btn">
            <div>
                <button type="button" class="btn btn-secondary btn-lg"><a href="index.php?act=fetch_product">Trở
                        về</a></button>
            </div>
            <div>
                <button type="submit" name="add_detail" class="btn btn-primary btn-lg">Thêm chi tiết</button>
            </div>
        </div>
    </form>
</body>

</html>
<?php
        }
    }
    //Nếu chưa thì xuất ra thông báo và trở lại trang hiển thị sản phẩm
    else {
        echo '<script type="text/javascript">';
        echo 'alert("Sản phẩm này đã có các chi tiết mô tả!");';
        echo 'window.history.back();'; 
        echo '</script>';
    }
?>