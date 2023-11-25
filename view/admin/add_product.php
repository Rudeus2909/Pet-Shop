<?php
    include "../apps/config/connectdb.php";

    //Kiểm tra xem người sử dụng có phải admin hay không?
    if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {
        $stmt = $conn->prepare('SELECT * FROM web.category');
        $stmt->execute();

        $stmt1 = $conn->prepare('SELECT * FROM web.type');
        $stmt1->execute();
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
    <div class="main">
        <div>
            <div class="title">
                <b></b>
                <h2>THÊM SẢN PHẨM</h2>
                <b></b>
            </div>
            <form action="index.php?act=code_add_product" method="post" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Chọn danh mục sản phẩm</label>
                    <select class="form-select" name="category" id="inputGroupSelect01">
                        <option selected>Danh mục...</option>
                        <!--Dùng value thêm danh mục sp dựa trên id danh mục-->
                        <?php while ($results = $stmt->fetch(PDO::FETCH_ASSOC)){?>
                        <option value="<?php echo $results["id_category"]?>"><?php echo $results["category_name"]?>
                        </option>
                        <?php }?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Chọn loại sản phẩm</label>
                    <select class="form-select" name="type" id="inputGroupSelect01">
                        <option selected>Loại...</option>
                        <!--Dùng value thêm loại sp dựa trên id loại sp-->
                        <?php while ($results1 = $stmt1->fetch(PDO::FETCH_ASSOC)){?>
                        <option value="<?php echo $results1["id_type"]?>"><?php echo $results1["type_name"]?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Tên sản phẩm</span>
                    <input type="text" name="product_name" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Giá</span>
                    <input type="text" name="price" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Số lượng</span>
                    <input type="text" name="amount" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupFile01">Tải ảnh</label>
                    <input type="file" name="image" class="form-control" id="inputGroupFile01">
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary" name="add" type="submit">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php } else {
        //Nếu không phải admin thì không cho phép truy cập
        echo '<script type="text/javascript">';
        echo 'alert("Bạn không có quyền truy cập");';
        echo 'window.location.href="index.php?act=home";'; 
        echo '</script>';
}?>