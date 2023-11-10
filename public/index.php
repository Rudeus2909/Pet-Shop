<?php

    include "../apps/config/connectdb.php";
    include "../apps/header.php";
    
    if(isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'product':
                include "../apps/product.php";
                break;
            case 'login':
                include "login.php";
                break;
            case 'logout':
                unset($_SESSION['username']);
                header('Location: index.php');
                break;
            case 'register':
                include "../apps/register.php";
                break;
            case 'userinfo':
                include "../apps/userinfo.php";
                break;
            case 'viewcart':
                include "../apps/viewcart.php";
            default:
                include "../apps/home.php";
                break;
        }
    } else {
        include "../apps/home.php";
    }

    include "../apps/footer.php";
?>