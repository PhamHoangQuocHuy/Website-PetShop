<?php
include('../../config/config.php');
$id = $_GET['idlichhen'];

// xu ly don hang
if (isset($_GET['code'])) {
    $code_service = $_GET['code'];
    $sql = mysqli_query($mysqli, "UPDATE tbl_lichhen SET service_status= 0 WHERE code_service='" . $code_service . "' ");
    header('Location: ../../index.php?action=quanlylichhen&query=lietke');
}
// xoa don hang
elseif (isset($_GET['idlichhen'])) {
    $sql_xoa = "DELETE FROM tbl_lichhen WHERE id_lichhen='" . $id . "' ";
    $kq = mysqli_query($mysqli, $sql_xoa);
    if (!$kq) {
        echo "Lỗi: " . mysqli_error($mysqli);
    }
    header('Location:../../index.php?action=quanlylichhen&query=lietke');
}
