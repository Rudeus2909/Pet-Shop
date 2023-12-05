<?php
    include "../apps/config/connectdb.php";

    //Lấy id_product bằng phương thức GET
    if (isset($_GET["id"])) {
        $id_product = $_GET["id"];
    }

    if (isset($_SESSION["id_user"])) {
        $stmt = $conn->prepare('SELECT * FROM web.product WHERE id_product=:id_product');
        $stmt->bindParam(':id_product', $id_product);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt1 = $conn->prepare('SELECT * FROM web.product_detail WHERE id_product=:id_product');
        $stmt1->bindParam(':id_product', $id_product);
        $stmt1->execute();
        $results1 = $stmt1->fetch(PDO::FETCH_ASSOC);
    }
    //Kiểm tra danh mục của id_product có phải là Phụ kiện hay không
    //Fetch dữ liệu trong CSDL
    $stmt2 = $conn->prepare('SELECT * FROM web.product JOIN web.category ON web.product.id_category=web.category.id_category
                                                            WHERE id_product=:id_product AND web.product.id_category="3"');
    $stmt2->bindParam('id_product', $id_product);
    $stmt2->execute();
    $results2 = $stmt2->fetchAll(PDO::FETCH_OBJ);
    //Dùng hàm count() để đếm số dòng dữ liệu
    $count2 = count($results2);
    //Nếu sản phẩm là thú cưng thì hiển thị form cập nhật chi tiết thú cưng 
    if ($count2 == 0){
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
        <h2>CHỈNH SỬA SẢN PHẨM</h2>
        <b></b>
    </div>
    <form action="index.php?act=code_update_product" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_product" value=<?=$id_product?>>
        <div class="row">
            <div class="col-4">
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="product_name" placeholder=""
                        id="floatingTextarea"><?=$results["product_name"]?></textarea>
                    <label for="floatingTextarea">Tên sản phẩm</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="price" class="form-control" required id="floatingInput" placeholder=" "
                        value=<?=$results["price"]?>>
                    <label for="floatingInput">Giá</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="amount" class="form-control" required id="floatingInput" placeholder=" "
                        value=<?=$results["amount"]?>>
                    <label for="floatingInput">Số lượng</label>
                </div>
            </div>
            <div class="col-4">
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="breed" placeholder=""
                        id="floatingTextarea"><?=$results1["breed"]?></textarea>
                    <label for="floatingTextarea">Giống</label>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control" name="color" placeholder=""
                        id="floatingTextarea"><?=$results1["color"]?></textarea>
                    <label for="floatingTextarea">Màu sắc</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="gender" class="form-control" required id="floatingInput" placeholder=" "
                        value=<?=$results1["gender"]?>>
                    <label for="floatingInput">Giới tính</label>
                </div>
            </div>
            <div class="col-4">
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="age" placeholder=""
                        id="floatingTextarea"><?=$results1["age"]?></textarea>
                    <label for="floatingTextarea">Tuổi</label>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control" name="vaccination" placeholder=""
                        id="floatingTextarea"><?=$results1["vaccination"]?></textarea>
                    <label for="floatingTextarea">Tiêm ngừa</label>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control" name="health_condition" placeholder=""
                        id="floatingTextarea"><?=$results1["health_condition"]?></textarea>
                    <label for="floatingTextarea">Tình trạng sức khỏe</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupFile01">Tải ảnh</label>
                    <input type="file" name="picture" class="form-control" id="inputGroupFile01">
                </div>
                <div>
                    <?php echo "<img src='data:image/png;base64,".base64_encode($results["picture"])."' width='140px'>"?>
                </div>
            </div>
            <div class="col-8">
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="detail_description" placeholder="" id="floatingTextarea"
                        style="height: 240px;"><?=$results1["detail_description"]?></textarea>
                    <label for="floatingTextarea">Mô tả</label>
                </div>
            </div>
        </div>
        <div class="add_detail_btn">
            <div>
                <button type="button" class="btn btn-secondary btn-lg"><a style="text-decoration: none;" href="index.php?act=fetch_product">Trở
                        về</a></button>
            </div>
            <div>
                <button type="submit" name="update_product" class="btn btn-primary btn-lg">Cập nhật</button>
            </div>
        </div>
    </form>
</body>

</html>
<?php } 
    //Nếu sản phẩm là phụ kiện thì hiển thị form cập nhật chi tiết phụ kiện
    else {?>
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
        <h2>CHỈNH SỬA SẢN PHẨM</h2>
        <b></b>
    </div>
    <form action="index.php?act=code_update_product" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_product" value=<?=$id_product?>>
        <div class="row">
            <div class="col-4">
                <div class="form-floating mb-3">
                    <input type="text" name="product_name" class="form-control" required id="floatingInput"
                        placeholder=" " value=<?=$results["product_name"]?>>
                    <label for="floatingInput">Mã sản phẩm</label>
                </div>
            </div>
            <div class="col-4">
                <div class="form-floating mb-3">
                    <input type="text" name="price" class="form-control" required id="floatingInput" placeholder=" "
                        value=<?=$results["price"]?>>
                    <label for="floatingInput">Giá</label>
                </div>
            </div>
            <div class="col-4">
                <div class="form-floating mb-3">
                    <input type="text" name="amount" class="form-control" required id="floatingInput" placeholder=" "
                        value=<?=$results["amount"]?>>
                    <label for="floatingInput">Số lượng</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupFile01">Tải ảnh</label>
                    <input type="file" name="picture" class="form-control" id="inputGroupFile01">
                </div>
                <div>
                    <?php echo "<img src='data:image/png;base64,".base64_encode($results["picture"])."' width='140px'>"?>
                </div>
            </div>
            <div class="col-8">
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="detail_description" placeholder="" id="floatingTextarea"
                        style="height: 240px;"><?=$results1["detail_description"]?></textarea>
                    <label for="floatingTextarea">Mô tả</label>
                </div>
            </div>
        </div>
        <div class="add_detail_btn">
            <div>
                <button type="button" class="btn btn-secondary btn-lg"><a style="text-decoration: none;" href="index.php?act=fetch_product">Trở
                        về</a></button>
            </div>
            <div>
                <button type="submit" name="update_product" class="btn btn-primary btn-lg">Cập nhật</button>
            </div>
        </div>
    </form>
</body>

</html>
<?php }?>