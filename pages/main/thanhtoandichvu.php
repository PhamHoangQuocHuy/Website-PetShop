<?php
session_start();
include('../../admincp/config/config.php');
// tao ma don cho khach
function generateRandomString($length = 8)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

// Tạo mã đơn cho khách hàng
if (isset($_SESSION['user']) && isset($_POST['xacnhan']) && isset($_SESSION['sd_dichvu'])) {
    // lay thong tin tu user
    $id_khachhang = $_SESSION['user']['id_user'];
    $name = $_SESSION['user']['name'];
    // lay thong tin tu dich vu da nhap vao su dung dich vu
    $name = $_SESSION['sd_dichvu']['id_dichvu'];
    $name = $_SESSION['sd_dichvu']['tendichvu'];
    $name = $_SESSION['sd_dichvu']['giadichvu'];
    // lay thong tin khach da nhap vao sau khi nhap xac nhan su dung dv
    $loaithucung = $_POST['loaithucung'];
    $giongthucung = $_POST['giongthucung'];
    $trongluong = $_POST['trongluong'];
    $thoigiandatlich = $_POST['lichhen'];
    $code_service = generateRandomString(10);
    $insert_service = "INSERT INTO tbl_lichhen(id_khachhang, name,id_dichvu,tendichvu,giadichvu,code_service,loaithucung, giongthucung,trongluong,thoigiandatlich,service_status) 
    VALUES ('$id_khachhang','$name','$id_dichvu','$tendichvu' ,'$giadichvu','$code_service', '$loaithucung','$giongthucung','$trongluong','$thoigiandatlich',1)";
    $result = mysqli_query($mysqli, $insert_service);
    if (!$result) {
        echo "Lỗi: " . mysqli_error($mysqli);
    } else {
        header('Location:../../index.php?quanly=camon');
    }
}
