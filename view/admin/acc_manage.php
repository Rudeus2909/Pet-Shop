<?php
    include "../apps/config/connectdb.php";

    $stmt = $conn->prepare('SELECT * FROM web.user');
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_OBJ);

    $stmt1 = $conn->prepare('SELECT * FROM web.user');
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
        <h2>QUẢN LÝ TÀI KHOẢN</h2>
        <b></b>
    </div>
    <div class="main">
        <div>
            <button type="button" id="update_info" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#exampleModal">Cập nhật vai trò</button>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Họ và tên</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Tên đăng nhập</th>
                    <th>Mật khẩu</th>
                    <th>Vai trò</th>
                </tr>
                <?php
            foreach ($results as $user) {
                $i = 1;
                ?>
                <tr>
                    <td><?php echo $user->id_user?></td>
                    <td><?php echo $user->name_user?></td>
                    <td><?php echo $user->address?></td>
                    <td><?php echo $user->phone?></td>
                    <td><?php echo $user->email?></td>
                    <td><?php echo $user->username?></td>
                    <td>***</td>
                    <td><?php echo $user->role?></td>
                </tr>
                <?php $i++;
                }?>
            </table>
            <form action="index.php?act=update_role" method="post">
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật vai trò</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <span>
                                    <label>ID tài khoản người dùng</label>
                                    <select name="id_user" id="id_user">
                                        <?php while ($results1 = $stmt1->fetch(PDO::FETCH_ASSOC)){?>
                                        <option value="<?php echo $results1["id_user"]?>">
                                            <?php echo $results1["id_user"]?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </span>
                                <span>
                                    <label>Vai trò</label>
                                    <select name="role" id="role">
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </span>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="submit" name="update_role" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>