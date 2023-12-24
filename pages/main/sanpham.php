<p style="font-size: 20px;"><strong>CHI TIẾT SẢN PHẨM</strong></p>
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
        <form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
            <div class="chitiet_sanpham">
                <h3>Tên sản phẩm: <?php echo $row_chitiet['tensanpham'] ?></h3>
                <p>MÃ SẢN PHẨM: <?php echo $row_chitiet['masanpham'] ?></p>
                <p >GIÁ SẢN PHẨM: <strong style="color: red;font-size: 20px;"> <?php echo number_format($row_chitiet['gia'], 0, ',', '.') . 'vnđ' ?></strong></p>
                <p>SỐ LƯỢNG: <?php echo $row_chitiet['soluong'] ?></p>
                <p>DANH MỤC SẢN PHẨM: <?php echo $row_chitiet['tendanhmuc'] ?></p>
                <p><input class="btn btn-success" name="themgiohang" class="themgiohang" type="submit" value="THÊM GIỎ HÀNG"> </p>
            </div>
        </form>
    </div>
<?php
}
?>