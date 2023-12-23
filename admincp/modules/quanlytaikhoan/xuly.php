<?php
// xoa tai khoan
include('../../config/config.php');
$id = $_GET['iduser'];
if (isset($_GET['iduser'])) {
    $sql_xoa = "DELETE FROM tbl_user WHERE id_user='" . $id . "' ";
    $kq = mysqli_query($mysqli, $sql_xoa);
    if (!$kq) {
        echo "Lỗi: " . mysqli_error($mysqli);
    }
    header('Location:../../index.php?action=quanlytaikhoan&query=lietke');
}
