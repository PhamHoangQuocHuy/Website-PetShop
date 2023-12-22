<p>Xem đơn hàng</p>
<?php
$code = $_GET['code'];
$sql_lietke_dh = "SELECT *FROM tbl_cart,tbl_sanpham WHERE tbl_cart.id_sanpham = tbl_sanpham.id_sanpham 
AND tbl_cart.code_cart ='".$code."' ORDER BY tbl_cart.id_cart ASC";
$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>
<table style="width: 100%" border="1" style="border-collapse: collapse;">

    <tr style="text-align: center;">
        <th>ID</th>
        <th>MÃ ĐƠN HÀNG</th>
        <th>TÊN SẢN PHẨM</th>
        <th>SỐ LƯỢNG</th>
        <th>GIÁ</th>
        <th>THÀNH TIỀN</th>
    </tr>

    <?php
    $i = 0;
    $tongtien=0;
    while ($row = mysqli_fetch_array($query_lietke_dh)) {
        $i++;
        $thanhtien = $row['gia'] *$row['soluongmua'];
        $tongtien += $thanhtien;
    ?>

        <tr style="text-align: center;">
            <td><?php echo $i ?></td>
            <td><?php echo $row['code_cart'] ?></td>
            <td><?php echo $row['tensanpham'] ?></td>
            <td><?php echo $row['soluongmua'] ?></td>
            <td><?php echo number_format($row['gia'],0,',','.').'vnđ'  ?></td>
            <td><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>
            <td>
            </td>
        </tr>
    <?php
    }
    ?>
    <tr>
        <td colspan="6">
            <p style="color: red; float: right;"><strong> Tổng tiền: <?php echo number_format($tongtien,0,',','.').'vnđ' ?></strong></p>
        </td>
    </tr>
</table>