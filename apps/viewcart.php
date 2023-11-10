<?php
    //Kiểm tra nếu tồn tại session giỏ hàng
    if(isset($_SESSION['cart'])) {
        

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <style type="text/css">
        table{
            width: 100%;
            height: 100%;
        }
        table, th, td{
            border: 1px solid black;
            border-collapse: collapse;
        }
        button{
            margin-left: 20%;
            font-family: "Roboto", sans-serif;
            font-size: 18px;
            font-weight: bold;
            width: 250px;
            background: #1E90FF;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            -webkit-transition-property: box-shadow, transform;
            transition-property: box-shadow, transform;
        }
        button:hover, button:focus, button:active{
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="text-align: center;">ĐƠN HÀNG CỦA BẠN</h2>
        <table>
            <tr>
                <th style="text-align: center; background: #898787">STT</th>
                <th style="text-align: center; background: #898787">Hình</th>
                <th style="text-align: center; background: #898787">Tên thú cưng</th>
                <th style="text-align: center; background: #898787">Đơn giá</th>
                <th style="text-align: center; background: #898787">Số lượng</th>
                <th style="text-align: center; background: #898787">Thành tiền</th>
                <th style="background: #898787"></th>
            </tr>
            <?php

                $tong = 0;

                //Biến đếm STT
                $i = 0;

                //Mỗi lần đọc 1 giỏ hàng là 1 sản phẩm
                foreach ($_SESSION['cart'] as $sp) {
                    //Định dạng number
                    $sum = $sp[3]*$sp[4];
                    $tong += $sum;
                    echo '<tr>
                            <td style="text-align: center;">'.($i+1).'</td>
                            <td style="width: 200px;"><img src="'.$sp[2].'" width="200px"></td>
                            <td style="text-align: center;">'.$sp[1].'</td>
                            <td style="text-align: center; width: 200px;">'.number_format($sp[3]).'</td>
                            <td style="text-align: center;">'.$sp[4].'</td>
                            <td style="text-align: center;">'.number_format($sum).'</td>
                            <td style="text-align: center;"><a href="delcart.php?id='.$i.'"><i class="fa-solid fa-trash-can"></i></a></td>
                        </tr>';
                        $i++;
                }
            ?>
            <tr>
                <td colspan="5"><strong>Tổng thành tiền</strong></td>
                <td style="text-align: center;"><?php echo number_format($tong);?></td>
                <td></td>
            </tr>
        </table>
        <button onclick="window.location.href='index.php?act=product'">Tiếp tục đặt hàng</button>
        <button onclick="window.location.href='delcart.php'">Xóa giỏ hàng</button>
    </div>
</body>
</html>
<?php
    } else {
        echo '<br><h4 style="text-align: center;">Giỏ hàng rỗng!</h4> <a href="index.php?act=product">Đặt hàng ngay</a>';
    }
?>