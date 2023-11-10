<?php
    include "../apps/config/connectdb.php";
    $username = $_SESSION['username'];
    $stmt = $conn->prepare('SELECT * FROM web.user WHERE username=:username');
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    $id_user = $_SESSION['id_user'];
    $stmt1 = $conn->prepare('SELECT * FROM web.orders WHERE id_user=:id_user');
    $stmt1->bindParam(':id_user', $id_user);
    $stmt1->execute();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="css/style_user.css">
</head>

<body>
    <div class="main">
        <div class="info">
            <div>
                <div class="title">
                    <b></b>
                    <h3 class="text-center">THÔNG TIN CÁ NHÂN</h3>
                    <b></b>
                </div>
                <table>
                    <tr>
                        <td id="td">Họ và tên</td>
                        <td><?php echo $results["name_user"];?></td>
                    </tr>
                    <tr>
                        <td id="td">Địa chỉ</td>
                        <td><?php echo $results["address"];?></td>
                    </tr>
                    <tr>
                        <td id="td">Số điện thoại</td>
                        <td><?php echo $results["phone"];?></td>
                    </tr>
                    <tr>
                        <td id="td">Email</td>
                        <td><?php echo $results["email"];?></td>
                    </tr>
                </table>
                <button id="orders" type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModal1" data-bs-whatever="@mdo">Đơn hàng của bạn</button>
                <button id="edit" type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModal" data-bs-whatever="@mdo">Chỉnh sửa thông tin</button>
                <button id="change_pass" type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    Đổi mật khẩu
                </button>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh sửa thông tin cá nhân</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="index.php?act=code_user_info" method="post">
                            <div class="mb-3 input-box">
                                <label class="col-form-label">Họ và tên</label>
                                <input type="text" class="form-control" require name="name">
                            </div>
                            <div class="mb-3 input-box">
                                <label class="col-form-label">Địa chỉ</label>
                                <input type="text" class="form-control" require name="address">
                            </div>
                            <div class="mb-3 input-box">
                                <label class="col-form-label">Điện thoại</label>
                                <input type="text" class="form-control" require name="phone">
                            </div>
                            <div class="mb-3 input-box">
                                <label class="col-form-label">Email</label>
                                <input type="text" class="form-control" require name="email">
                            </div>
                            <input type="submit" class="btn" value="Cập nhật" name="send">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                style="border: none;">Đóng</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Đổi mật khẩu</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="index.php?act=code_user_info" method="post">
                            <div class="mb-3 input-box">
                                <label class="col-form-label">Mật khẩu hiện tại</label>
                                <input type="password" class="form-control" require name="current-pass">
                            </div>

                            <div class="mb-3 input-box">
                                <label class="col-form-label">Mật khẩu mới</label>
                                <input type="password" class="form-control" require name="new-pass">
                            </div>

                            <div class="mb-3 input-box">
                                <label class="col-form-label">Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" require name="re-pass">
                            </div>

                            <input type="submit" class="btn" value="Thay đổi" name="change">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                style="border: none;">Đóng</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel1">Đơn hàng của bạn</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table>
                            <tr>
                                <th>Mã Đơn hàng</th>
                                <th>Thời gian đặt hàng</th>
                                <th> </th>
                            </tr>
                            <?php while ($results1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {?>
                            <tr>
                                <td><?php echo $results1["order_code"]?></td>
                                <td><?php echo $results1["order_time"]?></td>
                                <td><form action="index.php?act=show_orders" method="post">
                                    <input type="hidden" name="id_order" value="<?=$results1["id_order"]?>">
                                    <input type="submit" name="order_detail" value="Xem chi tiết">
                                </form></td>
                            </tr>
                            <?php }?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>