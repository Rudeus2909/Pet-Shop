<?php
// Kết nối CSDL
include "../apps/config/connectdb.php";

//Kiểm tra xem người sử dụng có phải admin hay không?
if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {

    // Số sản phẩm được hiển thị trên mỗi trang
    $productsPerPage = 7;

    // Xác định trang hiện tại từ tham số truyền vào hoặc mặc định là trang 1
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

    // Tính toán vị trí bắt đầu của sản phẩm trên trang hiện tại
    $start = ($currentPage - 1) * $productsPerPage;

    // Truy vấn CSDL với LIMIT để lấy số lượng sản phẩm trên mỗi trang
    $stmt = $conn->prepare("SELECT * FROM web.product JOIN web.type ON web.product.id_type=web.type.id_type
                                                    JOIN web.category ON web.product.id_category=web.category.id_category
                                                     LIMIT :start, :productsPerPage");
    $stmt->bindParam(':start', $start, PDO::PARAM_INT);
    $stmt->bindParam(':productsPerPage', $productsPerPage, PDO::PARAM_INT);
    $stmt->execute();

    // Lấy tổng số sản phẩm từ CSDL
    $stmt_count = $conn->prepare("SELECT COUNT(*) as total FROM web.product");
    $stmt_count->execute();
    $totalProducts = $stmt_count->fetch(PDO::FETCH_ASSOC)['total'];

    // Tính toán số trang dựa trên tổng số sản phẩm và số sản phẩm trên mỗi trang
    $pages = ceil($totalProducts / $productsPerPage);

    // Truy vấn CSDL với LIMIT để lấy ID sản phẩm trên mỗi trang
    $stmt1 = $conn->prepare("SELECT * FROM web.product JOIN web.type ON web.product.id_type=web.type.id_type
                                                    JOIN web.category ON web.product.id_category=web.category.id_category
                                                     LIMIT :start, :productsPerPage");
    $stmt1->bindParam(':start', $start, PDO::PARAM_INT);
    $stmt1->bindParam(':productsPerPage', $productsPerPage, PDO::PARAM_INT);
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
    <div class="title">
        <b></b>
        <h2>TẤT CẢ SẢN PHẨM</h2>
        <b></b>
    </div>
    <div class="btn1">
        <button type="button" class="btn del" data-bs-toggle="modal" href="#exampleModalToggle">
            Xóa sản phẩm
        </button>
        <!--Modal xóa sản phẩm -->
        <form action="index.php?act=delete_product" method="post">
            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Xóa sản phẩm</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Chọn ID sản phẩm cần
                                    xóa</label>
                                <select class="form-select" name="id_product" id="inputGroupSelect01">
                                    <option selected>ID...</option>
                                    <!--Dùng value thêm danh mục sp dựa trên id danh mục-->
                                    <?php while ($results1 = $stmt1->fetch(PDO::FETCH_ASSOC)){?>
                                    <option value="<?php echo $results1["id_product"]?>">
                                        <?php echo $results1["id_product"]?>
                                    </option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Trở về</button>
                            <button type="submit" name="delete_product" class="btn btn-danger">Xóa</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="main">
        <div>
            <table>
                <tr>
                    <th id="id">ID</th>
                    <th id="product_name">Mã sản phẩm</th>
                    <th id="picture">Hình ảnh</th>
                    <th id="cate">Danh mục</th>
                    <th id="type">Loài</th>
                    <th id="price">Giá</th>
                    <th id="amount">Số lượng còn lại</th>
                    <th style="border: none;"> </th>
                </tr>
                <?php while ($results = $stmt->fetch(PDO::FETCH_ASSOC)){?>
                <tr>
                    <td id="td_id"><?php echo $results["id_product"]?></td>
                    <td><?php echo $results["product_name"]?></td>
                    <td id="td_picture">
                        <?php echo "<img src='data:image/png;base64,".base64_encode($results['picture'])."' style='width: 150px'>"?>
                    </td>
                    <td><?php echo $results["category_name"]?></td>
                    <td><?php echo $results["type_name"]?></td>
                    <td><?php echo number_format($results["price"])?> ₫</td>
                    <td><?php echo $results["amount"]?></td>
                    <td>
                        <a href="index.php?act=update_product&&id=<?=$results["id_product"]?>" class="btn btn-primary"
                            role="button">Cập nhật</a>
                        <a href="index.php?act=add_product_detail&&id=<?=$results["id_product"]?>"
                            class="btn btn-primary" role="button">Thêm chi tiết</a>
                    </td>
                </tr>
                <?php }?>
            </table>

            <!-- Hiển thị liên kết phân trang -->
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php for ($i = 1; $i <= $pages; $i++) { ?>
                    <li class="page-item"><a class="page-link"
                            href="?act=fetch_product&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php } ?>
                </ul>
            </nav>
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