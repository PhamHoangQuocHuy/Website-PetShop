<?php
include('../../config/config.php');
$tenloaidichvu = $_POST['tendanhmucdichvu'];
$thutu = $_POST['thutu'];
if (isset($_POST['themdanhmucdichvu'])) {
    //them
    $sql_them = "INSERT INTO tbl_danhmucdichvu (tendanhmucdichvu, thutu) VALUES ('$tenloaidichvu', '$thutu')";
    echo $sql_them;
    $result =  mysqli_query($mysqli, $sql_them);
    if (!$result) {
        echo "Error: " . mysqli_error($mysqli);
    }
    header('Location:../../index.php?action=quanlydanhmucdichvu&query=them');
} elseif (isset($_POST['suadanhmucdichvu'])) {
    //sua
    $sql_update = "UPDATE tbl_danhmucdichvu SET tendanhmucdichvu='".$tenloaidichvu."', thutu ='".$thutu."' WHERE id_danhmucdichvu='$_GET[iddanhmucdichvu]' ";
    $result =  mysqli_query($mysqli, $sql_update);
    if (!$result) {
        echo "Error: " . mysqli_error($mysqli);
    }
    header('Location:../../index.php?action=quanlydanhmucdichvu&query=them');
} else{
    //xoa
    $id = $_GET['iddanhmucdichvu'];
    $sql_xoa = "DELETE FROM tbl_danhmuc WHERE id_danhmucdichvu = '" . $id . "'  ";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../../index.php?action=quanlydanhmucdichvu&query=them');
}