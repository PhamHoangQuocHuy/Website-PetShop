<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// lay thong tin tu user
$id_khachhang = $_SESSION['user']['id_user'];
$name = $_SESSION['user']['name'];
// lay thong tin tu dich vu da nhap vao su dung dich vu
if (isset($_GET['iddichvu'])) {
    $id_dichvu = $_GET['iddichvu'];
}
$sql_dv = "SELECT * FROM tbl_dichvu WHERE id_dichvu = '" . $id_dichvu . "'";
$result = mysqli_query($mysqli, $sql_dv);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $tendichvu = isset($row['tendichvu']) ? $row['tendichvu'] : '';
    $giadichvu = isset($row['giadichvu']) ? $row['giadichvu'] : '';
}
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

if (isset($_POST['xacnhan'])) {
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
    }else {
        header('Location: ../../index.php?quanly=camon');
        exit; // Kết thúc script sau khi chuyển hướng
    }
}
