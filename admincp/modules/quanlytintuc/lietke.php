<?php
$sql_lietke_tintuc = "SELECT *FROM tbl_tintuc,tbl_danhmuctintuc WHERE tbl_tintuc.id_danhmuctintuc = tbl_danhmuctintuc.id_danhmuctintuc ORDER BY id_tintuc ASC";
$query_lietke_tintuc = mysqli_query($mysqli, $sql_lietke_tintuc);
?>
<br><br>
<p style="text-align: center;font-size: 30px;"><strong> LIỆT KÊ TIN TỨC</strong></p>
<table style="width: 100%" border="1" style="border-collapse: collapse;">

    <tr style="text-align: center;">
        <th class="th_edit">ID</th>
        <th class="th_edit">TÊN TIN TỨC</th>
        <th class="th_edit">MÃ TIN TỨC</th>
        <th class="th_edit">HÌNH ẢNH</th>
        <th class="th_edit">DANH MỤC</th>
        <th class="th_edit">TÓM TẮT</th>
        <th class="th_edit">TÌNH TRẠNG</th>
        <th class="th_edit">QUẢN LÝ</th>
    </tr>

    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_tintuc)) {
        $i++;

    ?>

        <tr style="text-align: center;">

            <td><?php echo $i ?></td>
            <td><?php echo $row['tentintuc'] ?></td>
            <td><?php echo $row['matintuc'] ?></td>
            <td><img src="modules/quanlytintuc/uploads/<?php echo $row['hinhanh'] ?>" width="150px" height="150px"> </td>
            <td><?php echo $row['tendanhmuctintuc'] ?></td>
            <td><?php echo $row['tomtat'] ?></td>
            <td><?php if ($row['tinhtrang'] == 1) {
                    echo 'KÍCH HOẠT';
                } else {
                    echo 'ẨN';
                }

                ?>

            </td>

            <td>
                <a class="btn btn-danger" href="modules/quanlytintuc/xuly.php?idtintuc=<?php echo $row['id_tintuc'] ?>"> XÓA</a> |
                <a class="btn btn-info" href="?action=quanlytintuc&query=sua&idtintuc=<?php echo $row['id_tintuc'] ?>">SỬA</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>