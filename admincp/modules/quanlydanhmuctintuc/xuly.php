<?php
include('../../config/config.php');
$tendanhmuctintuc = $_POST['tendanhmuctintuc'];
$thutu = $_POST['thutu'];
if (isset($_POST['themdanhmuctintuc'])) {
    //them
    $sql_them = "INSERT INTO tbl_danhmuctintuc (tendanhmuctintuc, thutu) VALUES ('$tendanhmuctintuc', '$thutu')";
    echo $sql_them;
    $result =  mysqli_query($mysqli, $sql_them);
    if (!$result) {
        echo "Error: " . mysqli_error($mysqli);
    }
    header('Location:../../index.php?action=quanlydanhmuctintuc&query=them');
} elseif (isset($_POST['suadanhmuctintuc'])) {
    //sua
    $sql_update = "UPDATE tbl_danhmuctintuc SET tendanhmuctintuc='".$tendanhmuctintuc."', thutu ='".$thutu."' WHERE id_danhmuctintuc='$_GET[iddanhmuctintuc]' ";
    $result =  mysqli_query($mysqli, $sql_update);
    if (!$result) {
        echo "Error: " . mysqli_error($mysqli);
    }
    header('Location:../../index.php?action=quanlydanhmuctintuc&query=them');
} else{
    //xoa
    $id = $_GET['iddanhmuctintuc'];
    $sql_xoa = "DELETE FROM tbl_tintuc WHERE id_danhmuctintuc = '" . $id . "'  ";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../../index.php?action=quanlydanhmuctintuc&query=them');
}