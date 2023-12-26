<?php
include('../../config/config.php');
$id = $_GET['idcart'];

// xu ly don hang
if (isset($_GET['code'])) {
    $code_cart = $_GET['code'];
    $sql = mysqli_query($mysqli, "UPDATE tbl_cart SET cart_status= 0 WHERE code_cart='" . $code_cart . "' ");
    header('Location: ../../index.php?action=quanlydonhang&query=lietke');
}
// xoa don hang
elseif (isset($_GET['idcart'])) {
    $sql_xoa = "DELETE FROM tbl_cart WHERE id_cart='" . $id . "' ";
    $kq = mysqli_query($mysqli, $sql_xoa);
    if (!$kq) {
        echo "Lỗi: " . mysqli_error($mysqli);
    }
    header('Location:../../index.php?action=quanlydonhang&query=lietke');
}
