<?php
include('../../config/config.php');
$masanpham = $_POST['masanpham'];
$tensanpham = $_POST['tensanpham'];
$gia = $_POST['gia'];
$soluong = $_POST['soluong'];
// xu ly hinh anh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time() . '_' . $hinhanh;

$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];
$danhmuc = $_POST['danhmuc'];


if (isset($_POST['themsanpham'])) {
    //them
    $sql_them = "INSERT INTO tbl_sanpham(masanpham,tensanpham,gia,soluong,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) 
    VALUE ('" . $masanpham . "','" . $tensanpham . "','" . $gia . "','" . $soluong . "'
    ,'" . $hinhanh . "','" . $tomtat . "','" . $noidung . "','" . $tinhtrang . "','" . $danhmuc . "')";
    $result =  mysqli_query($mysqli, $sql_them);
    if (!$result) {
        echo "Error: " . mysqli_error($mysqli);
    }
    move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
    header('Location:../../index.php?action=quanlysp&query=them');
} elseif (isset($_POST['suasanpham'])) {
    //sua
    if ($hinhanh != '') {
        move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);

        $sql_update = "UPDATE tbl_sanpham SET masanpham ='" . $masanpham . "',tensanpham='" . $tensanpham . "', gia ='" . $gia . "',soluong ='" . $soluong . "',
    hinhanh ='" . $hinhanh . "',tomtat ='" . $tomtat . "',noidung ='" . $noidung . "',tinhtrang ='" . $tinhtrang . "',id_danhmuc ='" . $danhmuc . "' WHERE id_sanpham='$_GET[idsanpham]' ";
        // Xoa hinh anh cu
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1 ";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('uploads/' . $row['hinhanh']);
        }
    } else {
        $sql_update = "UPDATE tbl_sanpham SET masanpham ='" . $masanpham . "',tensanpham='" . $tensanpham . "', gia ='" . $gia . "',soluong ='" . $soluong . "',
        tomtat ='" . $tomtat . "',noidung ='" . $noidung . "',tinhtrang ='" . $tinhtrang . "',id_danhmuc ='" . $danhmuc . "' WHERE id_sanpham='$_GET[idsanpham]' ";
    }
    $result =  mysqli_query($mysqli, $sql_update);
    if (!$result) {
        echo "Error: " . mysqli_error($mysqli);
    }
    header('Location:../../index.php?action=quanlysp&query=them');
} else {
    //xoa
    $id = $_GET['idsanpham'];
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1 ";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('uploads/' . $row['hinhanh']);
    }
    $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham='" . $id . "'  ";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../../index.php?action=quanlysp&query=them');
}
