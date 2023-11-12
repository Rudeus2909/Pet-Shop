<?php
// Kết nối CSDL
include "../apps/config/connectdb.php";

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/manage_product.css">
</head>

<body>
    <div class="title">
        <b></b>
        <h2>TẤT CẢ SẢN PHẨM</h2>
        <b></b>
    </div>
    <div class="btn1">
        <button class="del">Xóa sản phẩm</button>
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
                    <td id="td_picture"><?php echo "<img src='data:image/png;base64,".base64_encode($results['picture'])."' style='width: 150px'>"?>
                    </td>
                    <td><?php echo $results["category_name"]?></td>
                    <td><?php echo $results["type_name"]?></td>
                    <td><?php echo number_format($results["price"])?> ₫</td>
                    <td><?php echo $results["amount"]?></td>
                    <td>
                        <a href="index.php?act=update_product&&id=<?=$results["id_product"]?>" class="btn btn-primary" role="button" data-bs-toggle="button">Cập nhật</a>
                        <a href="index.php?act=add_product_detail&&id=<?=$results["id_product"]?>" class="btn btn-primary" role="button" data-bs-toggle="button">Thêm chi tiết</a>
                    </td>
                </tr>
                <?php }?>
            </table>

            <!-- Hiển thị liên kết phân trang -->
            <?php for ($i = 1; $i <= $pages; $i++) { ?>
            <a href="?act=fetch_product&page=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php } ?>
        </div>
    </div>
</body>

</html>