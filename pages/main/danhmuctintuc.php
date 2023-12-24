<?php
$sql_pro = "SELECT * FROM tbl_tintuc WHERE tbl_tintuc.id_danhmuctintuc = '$_GET[id]' ORDER BY id_tintuc DESC";
$query_pro = mysqli_query($mysqli, $sql_pro);
//get ten danh muc
$sql_cate = "SELECT * FROM tbl_danhmuctintuc WHERE tbl_danhmuctintuc.id_danhmuctintuc = '$_GET[id]' LIMIT 1";
$query_cate = mysqli_query($mysqli, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>
<style>
    ul.product-list li {
        width: 30%;
        border: 1px dashed black;
        margin: 14px;
        float: left;
        background: blanchedalmond;
    }

    ul.product-list li img {
        width: 290px;
    }

    .product-list {
        list-style: none;
        padding: 0;
    }

    .product-list li {
        display: inline-block;
        width: 250px;
        /* Adjust the width as per your design */
        margin: 10px;
        text-align: center;
        border: 1px solid #ccc;
        padding: 10px;
    }

    .product-list li img {
        width: 500px;
        height: auto;
    }
</style>

<h3 class="title">DANH MỤC TIN TỨC: <?php echo $row_title['tendanhmuctintuc'] ?></h3>
<ul class="product-list">
    <?php
    while ($row_pro = mysqli_fetch_array($query_pro)) {
    ?>
        <li>
            <a href="index.php?quanly=tintuc&id=<?php echo $row_pro['id_tintuc'] ?>">
                <img src="admincp/modules/quanlytintuc/uploads/<?php echo $row_pro['hinhanh'] ?>">
                <p class="title_product">Tên tin tức: <?php echo $row_pro['tentintuc'] ?></p>
                <p class="title_product" style="color: red;"><?php echo $row_pro['tomtat'] ?></p>
            </a>
        </li>
    <?php
    }
    ?>
</ul>