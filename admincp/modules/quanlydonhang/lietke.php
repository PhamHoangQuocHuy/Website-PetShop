<br><br>
<p style="text-align: center;font-size: 30px;"><strong> Liệt kê đơn hàng</strong></p>
<?php
$sql_lietke_dh = "SELECT *FROM tbl_cart,tbl_user WHERE tbl_cart.id_khachhang = tbl_user.id_user ORDER BY tbl_cart.id_cart ASC";
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
        <th class="th_edit">NGÀY ĐẶT</th>
        <th class="th_edit">QUẢN LÝ</th>
    </tr>

    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_dh)) {
        $i++;
        $thoigianmua = strtotime($row['thoigianmua']);
        $ngaydat = date('H:i:s - d/m/Y', $thoigianmua);

    ?>

        <tr style="text-align: center;">
            <td><?php echo $i ?></td>
            <td><?php echo $row['code_cart'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['diachi'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['dienthoai'] ?></td>
            <td>
                <?php if ($row['cart_status'] == 1) {
                    echo '<strong><a href="modules/quanlydonhang/xuly.php?code=' . $row['code_cart'] . ' ">Đơn hàng mới</strong></a>';
                }else{
                    echo '<strong style="color:green"> Đã xử lý</strong>';
                }
                ?>
            </td>
            <td><?php echo $ngaydat ?></td>
            <td>
                <a class="btn btn-info" href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>"> Xem đơn hàng</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>