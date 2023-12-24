<?php
include('../../config/config.php');
$tentintuc = $_POST['tentintuc'];
$matintuc = $_POST['matintuc'];
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];
$danhmuctintuc = $_POST['danhmuctintuc'];
// xu ly hinh anh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time() . '_' . $hinhanh;

if (isset($_POST['themtintuc'])) {
    //them
    $sql_themtintuc = "INSERT INTO tbl_tintuc (tentintuc, matintuc, hinhanh, tomtat, noidung,tinhtrang,id_danhmuctintuc) VALUES ('$tentintuc', '$matintuc', '$hinhanh', '$tomtat', '$noidung', '$tinhtrang','$danhmuctintuc')";
    $result =  mysqli_query($mysqli, $sql_themtintuc);
    if (!$result) {
        echo "Error: " . mysqli_error($mysqli);
    }
    move_uploaded_file($hinhanh_tmp,'uploads/' .$hinhanh);
    header('Location:../../index.php?action=quanlytintuc&query=them');

} elseif (isset($_POST['suatintuc'])) {
    //sua
    if ($hinhanh != '') {
        move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);

        $sql_update = "UPDATE tbl_tintuc SET matintuc ='" . $matintuc . "',tentintuc='" . $tentintuc . "',hinhanh ='" . $hinhanh . "',tomtat ='" . $tomtat . "',noidung ='" . $noidung . "',tinhtrang ='" . $tinhtrang . "',id_danhmuctintuc ='" . $danhmuctintuc . "' WHERE id_tintuc='$_GET[idtintuc]' ";
        // Xoa hinh anh cu
        $sql = "SELECT * FROM tbl_tintuc WHERE id_tintuc = '$_GET[idtintuc]' LIMIT 1 ";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('uploads/' . $row['hinhanh']);
        }
    } else {
        $sql_update = "UPDATE tbl_tintuc SET matintuc ='" . $matintuc . "',tentintuc='" . $tentintuc . "',tomtat ='" . $tomtat . "',noidung ='" . $noidung . "',tinhtrang ='" . $tinhtrang . "',id_danhmuctintuc ='" . $danhmuctintuc . "' WHERE id_tintuc='$_GET[idtintuc]' ";
    }
    $result =  mysqli_query($mysqli, $sql_update);
    if (!$result) {
        echo "Error: " . mysqli_error($mysqli);
    }
    header('Location:../../index.php?action=quanlytintuc&query=them');
} else {
    //xoa
    $id = $_GET['idtintuc'];
    $sql = "SELECT * FROM tbl_tintuc WHERE id_tintuc = '$id' LIMIT 1 ";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('uploads/' . $row['hinhanh']);
    }
    $sql_xoa = "DELETE FROM tbl_tintuc WHERE id_tintuc='" . $id . "'  ";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../../index.php?action=quanlytintuc&query=them');
}
