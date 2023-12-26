<?php
if(isset($_GET['trang'])){
    $page = $_GET['trang'];
}else{
    $page ='';
}
if($page =='' ||$page==1){
    $begin =0;
}else{
    $begin =($page*3)-3;
}
$sql_pro = "SELECT * FROM tbl_dichvu WHERE tbl_dichvu.id_danhmucdichvu = '$_GET[id]' ORDER BY id_dichvu DESC";
$query_pro = mysqli_query($mysqli, $sql_pro);
//get ten danh muc
$sql_cate = "SELECT * FROM tbl_danhmucdichvu WHERE tbl_danhmucdichvu.id_danhmucdichvu = '$_GET[id]' LIMIT $begin,3";
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
<div style="clear: both;"></div>
<br><br>
<style type="text/css">
    ul.list_trang {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    ul.list_trang li {
        float: left;
        padding: 5px 13px;
        margin: 5px;
        background: #767C7C;
        display: block;
    }

    ul.list_trang li a {
        color: #000;
        text-align: center;
        text-decoration: none;
    }
    ul.list_trang li:hover{
        background-color: #e4e7e9;
    }
</style>
<?php
$sql_trang = mysqli_query($mysqli, "SELECT *FROM tbl_danhmucdichvu");
$row_count = mysqli_num_rows($sql_trang);
$trang = ceil($row_count / 3);
?>
<p>Trang hiện tại: <?php echo $page ?>/<?php echo $trang ?> </p>
<ul class="list_trang">
    <?php
    for ($i =1; $i <= $trang; $i++) {
    ?>
        <li <?php if($i==$page){echo 'style="background:#323E74;"';}else{echo '';} ?>>
        <a href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
    <?php
    }
    ?>
</ul>