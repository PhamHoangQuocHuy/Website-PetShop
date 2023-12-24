<?php
$sql_pro = "SELECT * FROM tbl_dichvu WHERE tbl_dichvu.id_danhmucdichvu = '$_GET[id]' ORDER BY id_dichvu DESC";
$query_pro = mysqli_query($mysqli, $sql_pro);
//get ten danh muc
$sql_cate = "SELECT * FROM tbl_danhmucdichvu WHERE tbl_danhmucdichvu.id_danhmucdichvu = '$_GET[id]' LIMIT 1";
$query_cate = mysqli_query($mysqli, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>
<style>
    .product-list {
        list-style: none;
        padding: 0;
    }

    .product-list li {
        display: inline-block;
        width: 250px; /* Adjust the width as per your design */
        margin: 10px;
        text-align: center;
        border: 1px solid #ccc;
        padding: 10px;
    }

    .product-list li img {
        max-width: 100%;
        height: auto;
    }
</style>
<h3 class="title">DANH MỤC DỊCH VỤ: <?php echo $row_title['tendanhmucdichvu'] ?></h3>
<ul class="product-list">
    <?php
    while ($row_pro = mysqli_fetch_array($query_pro)) {
    ?>
        <li>
            <a href="index.php?quanly=dichvu&id=<?php echo $row_pro['id_dichvu'] ?>">
                <img src="admincp/modules/quanlydichvu/uploads/<?php echo $row_pro['hinhanh'] ?>">
                <p class="title_product">Tên dịch vụ: <?php echo $row_pro['tendichvu'] ?></p>
                <p class="price_product"> Giá dịch vụ: <strong style="color: red;"><?php echo number_format($row_pro['giadichvu'], 0, ',', '.') . 'vnđ' ?> </strong></p>
            </a>
        </li>
    <?php
    }
    ?>
</ul>