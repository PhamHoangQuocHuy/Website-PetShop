<p>Liệt kê đơn hàng</p>
<?php
$sql_lietke_tk = "SELECT *FROM tbl_user ORDER BY id_user ASC";
$query_lietke_tk = mysqli_query($mysqli, $sql_lietke_tk);
?>
<table style="width: 100%" border="1" style="border-collapse: collapse;">

    <tr style="text-align: center;">
        <th>ID</th>
        <th>TÊN NGƯỜI DÙNG</th>
        <th>EMAIL</th>
        <th>ĐỊA CHỈ</th>
        <th>SỐ ĐIỆN THOẠI</th>
        <th>QUẢN LÝ</th>
    </tr>

    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_tk)) {
        $i++;

    ?>

        <tr style="text-align: center;">
            <td><?php echo $i ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['diachi'] ?></td>
            <td><?php echo $row['dienthoai'] ?></td>
            <td>
                <a class="btn btn-info" href="index.php?action=taikhoan&query=xemtaikhoan&id=<?php echo $row['id_user'] ?>"> Xem tài khoản</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>