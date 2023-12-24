<?php
$sql_lietke_dichvu = "SELECT *FROM tbl_dichvu,tbl_danhmucdichvu WHERE tbl_dichvu.id_danhmucdichvu = tbl_danhmucdichvu.id_danhmucdichvu ORDER BY id_dichvu ASC";
$query_lietke_dichvu = mysqli_query($mysqli, $sql_lietke_dichvu);
?>
<br><br>
<p style="text-align: center;font-size: 30px;"><strong> LIỆT KÊ DỊCH VỤ</strong></p>
<table style="width: 100%" border="1" style="border-collapse: collapse;">

    <tr style="text-align: center;">
        <th class="th_edit">ID</th>
        <th class="th_edit">TÊN DỊCH VỤ</th>
        <th class="th_edit">MÃ DỊCH VỤ</th>
        <th class="th_edit">HÌNH ẢNH</th>
        <th class="th_edit">GIÁ DỊCH VỤ</th>
        <th class="th_edit">DANH MỤC</th>
        <th class="th_edit">TÓM TẮT</th>
        <th class="th_edit">TÌNH TRẠNG</th>
        <th class="th_edit">QUẢN LÝ</th>
    </tr>

    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_dichvu)) {
        $i++;

    ?>

        <tr style="text-align: center;">

            <td><?php echo $i ?></td>
            <td><?php echo $row['tendichvu'] ?></td>
            <td><?php echo $row['madichvu'] ?></td>
            <td><img src="modules/quanlydichvu/uploads/<?php echo $row['hinhanh'] ?>" width="150px" height="150px"> </td>
            <td><?php echo number_format($row['giadichvu'], 0, ',', '.').'vnđ'  ?></td>
            <td><?php echo $row['tendanhmucdichvu'] ?></td>
            <td><?php echo $row['tomtat'] ?></td>
            <td><?php if ($row['tinhtrang'] == 1) {
                    echo 'KÍCH HOẠT';
                } else {
                    echo 'ẨN';
                }

                ?>

            </td>

            <td>
                <a class="btn btn-danger" href="modules/quanlydichvu/xuly.php?iddichvu=<?php echo $row['id_dichvu'] ?>"> XÓA</a> |
                <a class="btn btn-info" href="?action=quanlydichvu&query=sua&iddichvu=<?php echo $row['id_dichvu'] ?>">SỬA</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>