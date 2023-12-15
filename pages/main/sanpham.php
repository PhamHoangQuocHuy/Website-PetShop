<p>CHI TIẾT SẢN PHẨM</p>
<?php
$sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc 
AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1 ";
$query_chitiet = mysqli_query($mysqli, $sql_chitiet);
while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
?>
    <div class="wrapper_chitiet">
        <div class="hinhanh_sanpham">
            <img width="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
        </div>
        <form method="POST" action="#">
            <div class="chitiet_sanpham">
                <h3>TÊN SẢN PHẨM: <?php echo $row_chitiet['tensanpham'] ?></h3>
                <p>MÃ SẢN PHẨM: <?php echo $row_chitiet['masanpham'] ?></p>
                <p>GIÁ SẢN PHẨM: <?php echo number_format($row_chitiet['gia'], 0, ',', '.') . 'vnđ' ?></p>
                <p>SỐ LƯỢNG: <?php echo $row_chitiet['soluong'] ?></p>
                <p>DANH MỤC SẢN PHẨM: <?php echo $row_chitiet['tendanhmuc'] ?></p>
                <p><input class="themgiohang" type="submit" value="THÊM GIỎ HÀNG"> </p>
            </div>
        </form>
    </div>
<?php
}
?>