<br><br>
<p style="text-align: center;font-size: 30px;"><strong> Liệt kê lịch hẹn</strong></p>
<?php
$sql_lietke_dh = "SELECT *FROM tbl_lichhen,tbl_user WHERE tbl_lichhen.id_khachhang = tbl_user.id_user ORDER BY tbl_lichhen.id_lichhen ASC";
$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>
<table style="width: 100%" border="1" style="border-collapse: collapse;">

    <tr style="text-align: center;">
        <th class="th_edit">ID</th>
        <th class="th_edit">MÃ ĐƠN HÀNG</th>
        <th class="th_edit">TÊN KHÁCH HÀNG</th>
        <th class="th_edit">ĐỊA CHỈ</th>
        <th class="th_edit">EMAIL</th>
        <th class="th_edit">SỐ ĐIỆN THOẠI</th>
        <th class="th_edit">TÌNH TRẠNG</th>
        <th class="th_edit">NGÀY ĐẶT LỊCH</th>
        <th class="th_edit">QUẢN LÝ</th>
    </tr>

    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_dh)) {
        $i++;
        $thoigiandatlich = strtotime($row['thoigiandatlich']);
        $ngaydat = date('H:i:s - d/m/Y', $thoigiandatlich);

    ?>

        <tr style="text-align: center;">
            <td><?php echo $i ?></td>
            <td><?php echo $row['code_service'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['diachi'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['dienthoai'] ?></td>
            <td>
                <?php if ($row['service_status'] == 1) {
                    echo '<strong><a href="modules/quanlylichhen/xuly.php?code=' . $row['code_service'] . ' ">Đơn hàng mới</strong></a>';
                }else{
                    echo '<strong style="color:green"> Đã xử lý</strong>';
                }
                ?>
            </td>
            <td><?php echo $ngaydat ?></td>
            <td>
                <a class="btn btn-info" href="index.php?action=lichhen&query=xemlichhen&code=<?php echo $row['code_service'] ?>"> Xem chi tiết đơn hàng</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>