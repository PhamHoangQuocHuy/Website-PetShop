<br><br><br>
<p style="text-align: center;font-size: 30px;"><strong> Xem tài khoản</strong></p>
<?php
$id = $_GET['id'];
$sql_lietke_dh = "SELECT *FROM tbl_user WHERE tbl_user.id_user = '" . $id . "' ORDER BY tbl_user.id_user ASC";
$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>
<table style="width: 100%" border="1" style="border-collapse: collapse;">

    <tr style="text-align: center;">
        <th class="th_edit">ID</th>
        <th class="th_edit">TÊN NGƯỜI DÙNG</th>
        <th class="th_edit">TÊN ĐĂNG NHẬP</th>
        <th class="th_edit">MẬT KHẨU</th>
        <th class="th_edit">CHỨC VỤ</th>
        <th class="th_edit">QUẢN LÝ</th>
    </tr>

    <?php
    $i = 0;

    while ($row = mysqli_fetch_array($query_lietke_dh)) {
        $i++;
    ?>

        <tr style="text-align: center;">
            <td><?php echo $i ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo  $row['password'] ?></td>
            <td><?php if ($row['role'] == 1) {
                    echo 'ADMIN';
                } else {
                    echo 'USER';
                } ?></td>
            <td>
                <a class="btn btn-danger" href="modules/quanlytaikhoan/xuly.php?iduser=<?php echo $row['id_user'] ?>"> XÓA</a>
            </td>

        </tr>
    <?php
    }
    ?>
</table>