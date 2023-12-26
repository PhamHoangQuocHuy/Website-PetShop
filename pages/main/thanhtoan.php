<?php
session_start();
include('../../admincp/config/config.php');
$id_khachhang = $_SESSION['user']['id_user'];
$name = $_SESSION['user']['name'];
// tao ma don cho khach
function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

if(isset($_SESSION['user'])){
    //them vao gio hang
    foreach($_SESSION['cart'] as $key => $value){
        $id_sanpham= $value['id'];
        $gia = $value['gia'];
        $soluong = $value['soluong'];
        $code_cart = generateRandomString(10);
        $insert_cart_item = "INSERT INTO tbl_cart(id_khachhang, name,id_sanpham,code_cart, gia, soluongmua,thoigianmua,cart_status) 
        VALUES ('$id_khachhang','$name','$id_sanpham', '$code_cart', '$gia','$soluong',NOW(),1)";
        $result = mysqli_query($mysqli,$insert_cart_item);
        if(!$result){
            echo "Lỗi: ".mysqli_error($mysqli);
            
        }
    }
}
unset($_SESSION['cart']);
header('Location:../../index.php?quanly=camon');
?>