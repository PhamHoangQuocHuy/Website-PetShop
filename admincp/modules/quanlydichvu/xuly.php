<?php
include('../../config/config.php');
$tendichvu = $_POST['tendichvu'];
$madichvu = $_POST['madichvu'];
$giadichvu = $_POST['giadichvu'];
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];
$danhmucdichvu = $_POST['danhmucdichvu'];
// xu ly hinh anh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time() . '_' . $hinhanh;

if (isset($_POST['themdichvu'])) {
    //them
    $sql_themdichvu = "INSERT INTO tbl_dichvu (tendichvu, madichvu, giadichvu, hinhanh, tomtat, noidung,tinhtrang,id_danhmucdichvu) VALUES ('$tendichvu', '$madichvu', '$giadichvu', '$hinhanh', '$tomtat', '$noidung', '$tinhtrang','$danhmucdichvu')";
    $result =  mysqli_query($mysqli, $sql_themdichvu);
    if (!$result) {
        echo "Error: " . mysqli_error($mysqli);
    }
    move_uploaded_file($hinhanh_tmp,'uploads/' .$hinhanh);
    header('Location:../../index.php?action=quanlydichvu&query=them');

} elseif (isset($_POST['suadichvu'])) {
    //sua
    if ($hinhanh != '') {
        move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);

        $sql_update = "UPDATE tbl_dichvu SET madichvu ='" . $madichvu . "',tendichvu='" . $tendichvu . "', giadichvu ='" . $giadichvu . "',hinhanh ='" . $hinhanh . "',tomtat ='" . $tomtat . "',noidung ='" . $noidung . "',tinhtrang ='" . $tinhtrang . "',id_danhmucdichvu ='" . $danhmucdichvu . "' WHERE id_dichvu='$_GET[iddichvu]' ";
        // Xoa hinh anh cu
        $sql = "SELECT * FROM tbl_dichvu WHERE id_dichvu = '$_GET[iddichvu]' LIMIT 1 ";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('uploads/' . $row['hinhanh']);
        }
    } else {
        $sql_update = "UPDATE tbl_dichvu SET madichvu ='" . $madichvu . "',tendichvu='" . $tendichvu . "', giadichvu ='" . $giadichvu . "',tomtat ='" . $tomtat . "',noidung ='" . $noidung . "',tinhtrang ='" . $tinhtrang . "',id_danhmucdichvu ='" . $danhmucdichvu . "' WHERE id_dichvu='$_GET[iddichvu]' ";
    }
    $result =  mysqli_query($mysqli, $sql_update);
    if (!$result) {
        echo "Error: " . mysqli_error($mysqli);
    }
    header('Location:../../index.php?action=quanlydichvu&query=them');
} else {
    //xoa
    $id = $_GET['iddichvu'];
    $sql = "SELECT * FROM tbl_dichvu WHERE id_dichvu = '$id' LIMIT 1 ";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('uploads/' . $row['hinhanh']);
    }
    $sql_xoa = "DELETE FROM tbl_dichvu WHERE id_dichvu='" . $id . "'  ";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../../index.php?action=quanlydichvu&query=them');
}
