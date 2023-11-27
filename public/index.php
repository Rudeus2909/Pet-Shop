<?php


    include "../apps/config/connectdb.php";
    session_start();
    
    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            //Đăng nhập
            case 'login':
                include "../view/header.php";
                include "../view/login.php";
                include "../view/footer.php";
                break;

            //Code xử lý đăng nhập
            case 'code_login':
                include "../model/code_login.php";
            
            //Đăng kí
            case 'register':
                include "../view/header.php";
                include "../view/register.php";
                include "../view/footer.php";
                break;
            
            //Code xử lý đăng kí
            case 'code_register':
                include "../model/code_register.php";
                break;

            //Giới thiệu
            case 'about_us':
                include "../view/header.php";
                include "../view/about_us.php";
                include "../view/footer.php";
                break;
            
            //Đăng xuất
            case 'signout':
                unset($_SESSION['username']);
                unset($_SESSION["id_user"]);
                unset($_SESSION["role"]);
                header('Location: index.php?act=home');
                break;
            
            //Hiển thị kết quả tìm kiếm
            case 'search':
                include "../view/header.php";
                include "../view/search.php";
                include "../view/footer.php";
                break;
            
            //Sản phẩm Chó Akita
            case 'akt':
                include "../view/header.php";
                include "../view/product/akita_inu.php";
                include "../view/footer.php";
                break;
            
            //Sản phẩm Chó Alaska
            case 'alk':
                include "../view/header.php";
                include "../view/product/alaska.php";
                include "../view/footer.php";
                break;
            
            //Sản phẩm Chó Golden Retriever
            case 'gd':
                include "../view/header.php";
                include "../view/product/golden.php";
                include "../view/footer.php";
                break;
            
            //Sản phẩm Chó Poodle
            case 'pd':
                include "../view/header.php";
                include "../view/product/poodle.php";
                include "../view/footer.php";
                break;
            
            //Sản phẩm Chó Samoyed
            case 'sm':
                include "../view/header.php";
                include "../view/product/samoyed.php";
                include "../view/footer.php";
                break;
            
            //Sản phẩm Mèo Anh Lông Ngắn
            case 'bsh':
                include "../view/header.php";
                include "../view/product/british_short_hair.php";
                include "../view/footer.php";
                break;

            //Sản phẩm Mèo Xiêm
            case 'sim':
                include "../view/header.php";
                include "../view/product/siamese.php";
                include "../view/footer.php";
                break;

            //Sản phẩm Mèo Ba Tư
            case 'ps':
                include "../view/header.php";
                include "../view/product/persian.php";
                include "../view/footer.php";
                break;
            
            //Sản phẩm Mèo Anh Lông Dài
            case 'blh':
                include "../view/header.php";
                include "../view/product/british_long_hair.php";
                include "../view/footer.php";
                break;

            //Sản phẩm Mèo Ragdoll
            case 'rd':
                include "../view/header.php";
                include "../view/product/ragdoll.php";
                include "../view/footer.php";
                break;

            //Sản phẩm Thức ăn
            case 'food':
                include "../view/header.php";
                include "../view/product/food.php";
                include "../view/footer.php";
                break;

            //Sản phẩm Đồ chơi
            case 'toy':
                include "../view/header.php";
                include "../view/product/toy.php";
                include "../view/footer.php";
                break;

            //Sản phẩm Balo
            case 'bp':
                include "../view/header.php";
                include "../view/product/backpack.php";
                include "../view/footer.php";
                break;
            
            //Hiển thị chi tiết sản phẩm
            case 'product_detail':
                include "../view/header.php";
                include "../view/product/product_detail.php";
                include "../view/footer.php";
                break;
            
            //NGƯỜI DÙNG THÀNH VIÊN

            //Hiển thị trang thông tin user
            case 'user_info':
                include "../view/header.php";
                include "../view/user/user_info.php";
                include "../view/footer.php";
                break;
            
            //Code xử lý cập nhật thông tin và đổi mật khẩu user
            case 'code_user_info':
                include "../model/user/code_user_info.php";
                break;

            //Hiển thị các đơn đặt hàng
            case 'show_orders':
                include "../view/header.php";
                include "../view/user/show_order_detail.php";
                include "../view/footer.php";
                break;

            //Code xử lý hủy đơn hàng
            case 'cancel_order':
                include "../model/user/code_cancel_order.php";
                break;

            //Giỏ hàng
            case 'cart':
                include "../view/header.php";
                include "../view/user/cart.php";
                include "../view/footer.php";
                break;
            
            //Code xử lý thêm sản phẩm vào giỏ    
            case 'add_cart':
                include "../model/user/code_add_cart.php";
                break;  
            
            //Code xử lý xóa sản phẩm khỏi giỏ
            case 'del_cart_product':
                include "../model/user/code_delete_cart_product.php";
                break;
            
            //Code xử lý cập nhật số lượng sản phẩm trong giỏ
            case 'update_cart':
                include "../model/user/code_update_cart.php";
                break;

            //Hiển thị trang đặt hàng
            case 'order':
                include "../view/header.php";
                include "../view/user/order.php";
                include "../view/footer.php";
                break;

            //Code xử lý đặt hàng
            case 'add_order':
                include "../model/user/code_add_order.php";
                break;    

            //NGƯỜI QUẢN TRỊ

            //Hiển thị trang chủ admin
            case 'admin':
                include "../view/admin/header_admin.php";
                include "../view/admin/index_admin.php";
                break;
            
            //Hiển thị trang quản lý tài khoản
            case 'account_manage':
                include "../view/admin/header_admin.php";
                include "../view/admin/acc_manage.php";
                break;
            
            //Code xử lý cập nhật vai trò
            case 'update_role':
                include "../model/admin/code_update_role.php";
                break;
            
            //Hiển thị thông tin admin
            case 'admin_info':
                include "../view/admin/header_admin.php";
                include "../view/admin/admin_info.php";
                break;

            //Code xử lý cập nhật thông tin và đổi mật khẩu admin
            case 'code_admin_info':
                include "../model/admin/code_admin_info.php";
                break;

            //Hiển thị trang thêm sản phẩm
            case 'add_product':
                include "../view/admin/header_admin.php";
                include "../view/admin/add_product.php";
                break;
            
            //Code xử lý thêm sản phẩm
            case 'code_add_product':
                include "../model/admin/code_add_product.php";
                break;

            //Hiển thị trang quản lý sản phẩm
            case 'fetch_product':
                include "../view/admin/header_admin.php";
                include "../view/admin/fetch_product.php";
                break;

            //Code xử lý xóa sản phẩm
            case 'delete_product':
                include "../model/admin/code_delete_product.php";
                break;

            //Hiển thị trang cập nhật sản phẩm
            case 'update_product':
                include "../view/admin/header_admin.php";
                include "../view/admin/update_product.php";
                break;

            //Code xử lý cập nhật sản phẩm
            case 'code_update_product':
                include "../model/admin/code_update_product.php";
                break;

            //Hiển thị trang thêm chi tiết sản phẩm
            case 'add_product_detail':
                include "../view/admin/header_admin.php";
                include "../view/admin/add_product_detail.php";
                break;
            
            //Code xử lý thêm chi tiết sản phẩm
            case 'code_add_product_detail':
                include "../model/admin/code_add_product_detail.php";
                break;

            //Hiển thị trang quản lý đơn hàng
            case 'order_manage':
                include "../view/admin/header_admin.php";
                include "../view/admin/order_manage.php";
                break;

            //Hiển thị trang quản lý chi tiết đơn hàng
            case 'manage_order_detail':
                include "../view/admin/header_admin.php";
                include "../view/admin/manage_order_detail.php";
                break;

            //Code xử lý xác nhận trạng thái đơn hàng
            case 'code_manage_order':
                include "../model/admin/code_manage_order.php";
                break;

            //Hiển thị trang chủ website
            case 'home':
                include "../view/header.php";
                include "../view/home.php";
                include "../view/footer.php";
                break;
        }
    } else {
        //Nếu không phải các trường hợp trên thì hiển thị trang chủ website
        include "../view/header.php";
        include "../view/home.php";
        include "../view/footer.php";
    }

?>