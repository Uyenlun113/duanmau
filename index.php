<?php
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/binhluan.php";
include "model/taikhoan.php";
include "global.php";

$spnew = loadall_sanpham_home();
$dsdm = loadall_danhmuc();
$dstop10 = loadall_sanpham_top10();

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "sanpham":
            $iddm = $_GET['iddm'];
            $dssp = list_category_product($iddm);
            $tendm = load_ten_dm($iddm);
            include "view/danhmuc/sanpham.php";
            break;

        case "sanphamct":
            isset($_SESSION['user']);
            $idUser = $_SESSION['user']['id'];

            if (isset($_POST['guibinhluan'])) {
                insert_binhluan($_POST['idpro'], $idUser, $_POST['noidung']);
            }

            if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
                $sanpham = loadone_sanpham($_GET['idsp']);
                $sanphamcl = load_sanpham_cungloai($_GET['idsp'], $sanpham['iddm']);
                $binhluan = loadall_binhluan($_GET['idsp']);
                include "view/chitietsanpham.php";
            } else {
                include "view/home.php";
            }
            break;

        case "dangky":
            if (isset($_POST['dangky']) && ($_POST['dangky'] != "")) {
                $email = $_POST['email'];
                $name = $_POST['user'];
                $pass = $_POST['pass'];
                insert_taikhoan($email, $name, $pass);
                $thongbao = "Đăng ký thành công";
            }
            include "view/auth/dangky.php";
            break;

        case "dangnhap":
            if (isset($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $loginMess = dangnhap($user, $pass);
                if (is_array($loginMess)) {
                    $_SESSION['user'] = $loginMess;
                    header("Location: index.php");
                } else {
                    $tb = "Không tồn tại";
                }
            }
            include "view/auth/dangky.php";
            break;

        case "dangxuat":
            dangxuat();
            include "view/home.php";
            break;

        case "quenmk":
            if (isset($_POST['guiemail'])) {
                $email = $_POST['email'];
                $sendMailMess = sendMail($email);
            }
            include "view/auth/quenmk.php";
            break;

        case "edit_taikhoan":
            if (isset($_POST['capnhat'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];
                update_taikhoan($id, $user, $pass, $email, $address, $tel);
                $_SESSION['user'] = dangnhap($user, $pass);
                header('location:index.php');
            }
            include "view/auth/edit_taikhoan.php";
            break;

        case "cart":
            include "view/cart/cart.php";
            break;

        case "add_to_cart":
            if (!isset($_COOKIE['shopping_cart'])) {
                $cart = array();
            } else {
                $cart = unserialize($_COOKIE['shopping_cart']);
            }
            if (isset($_POST['add_to_cart'])) {
                $product_id = $_POST['product_id'];
                $product_info = loadone_sanpham($product_id);
                $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
                if ($quantity > 0) {
                    $item = array(
                        'id' => $product_info['id'],
                        'img' => $product_info['img'],
                        'name' => $product_info['name'],
                        'quantity' => $quantity, 
                        'price' => $product_info['price']
                    );
                    if (isset($cart[$product_id])) {
                        $cart[$product_id]['quantity'] += 1; // Cập nhật số lượng
                    } else {
                        $cart[$product_id] = $item;
                    }
                    setcookie('shopping_cart', serialize($cart), time() + 3600, '/');
                    header("Location: index.php?act=cart");
                } 
            }
            break;
        case "remove_from_cart":
            if (isset($_GET['product_id'])) {
                $product_id_to_remove = $_GET['product_id'];
                if (isset($_COOKIE['shopping_cart'])) {
                    $cart = unserialize($_COOKIE['shopping_cart']);
                    if (isset($cart[$product_id_to_remove])) {
                        unset($cart[$product_id_to_remove]); // Xóa sản phẩm khỏi giỏ hàng
                        setcookie('shopping_cart', serialize($cart), time() + 3600, '/');
                    }
                }
            }
            header("Location: index.php?act=cart");
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
?>