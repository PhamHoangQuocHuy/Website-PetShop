<?php
$sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc = '$_GET[id]' ORDER BY tbl_sanpham.id_sanpham DESC";
$query_pro = mysqli_query($mysqli, $sql_pro);
?>

<h3 class="title">DANH MỤC SẢN PHẨM: <?php $row_pro['tendanhmuc'] ?></h3>
<ul class="product-list">
    <?php
    while ($row_pro = mysqli_fetch_array($query_pro)) {
    ?>
        <li>
            <a href="">
                <img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>">
                <p class="title_product">Tên sản phẩm: <?php echo $row_pro['tensanpham'] ?></p>
                <p class="price_product"> Giá: <strong style="color: red;"><?php echo number_format($row_pro['gia'],0,',','.').'vnđ' ?> </strong></p>
            </a>
        </li>
    <?php
    }
    ?>
</ul>