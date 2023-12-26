<br><br>
<p style="text-align: center;font-size: 30px;"><strong>Xem đơn hàng</strong></p>
<?php
$code = $_GET['code'];
$sql_lietke_lichhen = "SELECT *FROM tbl_lichhen,tbl_dichvu WHERE tbl_lichhen.id_dichvu = tbl_dichvu.id_dichvu 
AND tbl_lichhen.code_service ='".$code."' ORDER BY tbl_lichhen.id_lichhen ASC";
$query_lietke_lichhen = mysqli_query($mysqli, $sql_lietke_lichhen);
?>
<table style="width: 100%" border="1" style="border-collapse: collapse;">

    <tr style="text-align: center;">
        <th class="th_edit">ID</th>
        <th class="th_edit">MÃ DỊCH VỤ</th>
        <th class="th_edit">TÊN DỊCH VỤ</th>
        <th class="th_edit">GIÁ DỊCH VỤ</th>
        <th class="th_edit">LOẠI THÚ CƯNG</th>
        <th class="th_edit">GIỐNG THÚ CƯNG</th>
        <th class="th_edit">TRỌNG LƯỢNG</th>
        <th class="th_edit">THÀNH TIỀN</th>
        <th class="th_edit">QUẢN LÝ</th>
    </tr>

    <?php
    $i = 0;
    $tongtien=0;
    while ($row = mysqli_fetch_array($query_lietke_lichhen)) {
        $i++;
        $thanhtien = $row['giadichvu']; 
        $tongtien += $thanhtien;
    ?>

        <tr style="text-align: center;">
            <td><?php echo $i ?></td>
            <td><?php echo $row['id_dichvu'] ?></td>
            <td><?php echo $row['tendichvu'] ?></td>
            <td><?php echo number_format($row['giadichvu'],0,',','.').'vnđ'  ?></td>
            <td><?php echo $row['loaithucung'] ?></td>
            <td><?php echo $row['giongthucung'] ?></td>
            <td><?php echo $row['trongluong'] ?></td>
            <td><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>
            <td>
                <a class="btn btn-danger" href="modules/quanlylichhen/xuly.php?idlichhen=<?php echo $row['id_lichhen'] ?>"> XÓA</a>
            </td>
        </tr>
    <?php
    }
    ?>
    <tr>
        <td colspan="9">
            <p style="color: red; float: right;"><strong> Tổng tiền: <?php echo number_format($tongtien,0,',','.').'vnđ' ?></strong></p>
        </td>
    </tr>
    
</table>