<p style="font-size: 20px;"><strong>CHI TIẾT DỊCH VỤ</strong></p>
<?php
$sql_chitiet = "SELECT * FROM tbl_dichvu,tbl_danhmucdichvu WHERE tbl_dichvu.id_danhmucdichvu = tbl_danhmucdichvu.id_danhmucdichvu 
AND tbl_dichvu.id_dichvu='$_GET[id]' LIMIT 1 ";
$query_chitiet = mysqli_query($mysqli, $sql_chitiet);
while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
?>
    <div class="wrapper_chitiet">
        <div class="hinhanh_sanpham">
            <img width="100%" src="admincp/modules/quanlydichvu/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
        </div>
        <form method="POST" action="pages/main/themgiohang.php?iddichvu=<?php echo $row_chitiet['id_dichvu'] ?>">
            <div class="chitiet_sanpham">
                <h3>Tên dịch vụ: <?php echo $row_chitiet['tendichvu'] ?></h3>
                <p>MÃ DỊCH VỤ: <?php echo $row_chitiet['madichvu'] ?></p>
                <p>GIÁ DỊCH VỤ: <strong style="color: red;font-size: 20px;"> <?php echo number_format($row_chitiet['giadichvu'], 0, ',', '.') . 'vnđ' ?></strong> </p>
                <p>DANH MỤC DỊCH VỤ: <?php echo $row_chitiet['tendanhmucdichvu'] ?></p>
                <p><input class="btn btn-success" name="sudungdichvu" class="sudungdichvu" type="submit" value="SỬ DỤNG DỊCH VỤ"> </p>
            </div>
        </form>
    </div>
<?php
}
?>