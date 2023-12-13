<?php
include('../../config/config.php');
$tensanpham = $_POST['tensanpham'];
$masanpham = $_POST['masanpham'];
$tensanpham = $_POST['tensanpham'];
$gia = $_POST['gia'];
$soluong = $_POST['soluong'];
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];


if (isset($_POST['themsanpham'])) {
    //them
    $sql_them = "INSERT INTO tbl_sanpham (tendanhmuc, thutu) VALUES ('$tenloaisp', '$thutu')";
    echo $sql_them;
    $result =  mysqli_query($mysqli, $sql_them);
    if (!$result) {
        echo "Error: " . mysqli_error($mysqli);
    }
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
} elseif (isset($_POST['suasanpham'])) {
    //sua
    $sql_update = "UPDATE tbl_danhmuc SET tendanhmuc='".$tenloaisp."', thutu ='".$thutu."' WHERE id_danhmuc='$_GET[iddanhmuc]' ";
    $result =  mysqli_query($mysqli, $sql_update);
    if (!$result) {
        echo "Error: " . mysqli_error($mysqli);
    }
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
} else{
    //xoa
    $id = $_GET['iddanhmuc'];
    $sql_xoa = "DELETE FROM tbl_danhmuc WHERE id_danhmuc = '" . $id . "'  ";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}
