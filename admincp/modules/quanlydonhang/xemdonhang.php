<br><br>
<p style="text-align: center;font-size: 30px;"><strong>Xem đơn hàng</strong></p>
<?php
$code = $_GET['code'];
$sql_lietke_dh = "SELECT *FROM tbl_cart,tbl_sanpham WHERE tbl_cart.id_sanpham = tbl_sanpham.id_sanpham 
AND tbl_cart.code_cart ='".$code."' ORDER BY tbl_cart.id_cart ASC";
$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>
<table style="width: 100%" border="1" style="border-collapse: collapse;">

    <tr style="text-align: center;">
        <th class="th_edit">ID</th>
        <th class="th_edit">MÃ ĐƠN HÀNG</th>
        <th class="th_edit">TÊN SẢN PHẨM</th>
        <th class="th_edit">SỐ LƯỢNG</th>
        <th class="th_edit">GIÁ</th>
        <th class="th_edit">THÀNH TIỀN</th>
        <th class="th_edit">QUẢN LÝ</th>
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
                <a class="btn btn-danger" href="modules/quanlydonhang/xuly.php?idcart=<?php echo $row['id_cart'] ?>"> XÓA</a>
            </td>
        </tr>
    <?php
    }
    ?>
    <tr>
        <td colspan="7">
            <p style="color: red; float: right;"><strong> Tổng tiền: <?php echo number_format($tongtien,0,',','.').'vnđ' ?></strong></p>
        </td>
    </tr>
    
</table>