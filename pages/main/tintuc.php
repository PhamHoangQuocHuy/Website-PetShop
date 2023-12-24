<p style="font-size: 20px;"><strong>CHI TIẾT TIN TỨC</strong></p>
<?php
$sql_chitiet = "SELECT * FROM tbl_tintuc,tbl_danhmuctintuc WHERE tbl_tintuc.id_danhmuctintuc = tbl_danhmuctintuc.id_danhmuctintuc 
AND tbl_tintuc.id_tintuc='$_GET[id]' LIMIT 1 ";
$query_chitiet = mysqli_query($mysqli, $sql_chitiet);
while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
?>
    <div class="wrapper_chitiet">
        <div class="hinhanh_sanpham">
            <img width="100%" src="admincp/modules/quanlytintuc/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
        </div>
        <form method="POST" action="pages/main/themgiohang.php?idtintuc=<?php echo $row_chitiet['id_tintuc'] ?>">
            <div class="chitiet_sanpham">
                <h3>Tên tin tức: <?php echo $row_chitiet['tentintuc'] ?></h3>
                <p><strong>NỘI DUNG: </strong><?php echo $row_chitiet['noidung'] ?></p>
            </div>
        </form>
    </div>
<?php
}
?>