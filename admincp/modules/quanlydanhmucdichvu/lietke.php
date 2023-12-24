<?php
$sql_lietke_danhmucdichvu = "SELECT *FROM tbl_danhmucdichvu ORDER BY thutu ASC";
$query_lietke_danhmucdichvu = mysqli_query($mysqli, $sql_lietke_danhmucdichvu);
?>
<br><br><br>
<p style="text-align: center;font-size: 30px;"><strong>Liệt kê danh mục dịch vụ</strong></p>
<table style="width: 100%" border="1" style="border-collapse: collapse;">

    <tr style="text-align: center;">
        <th class="th_edit">ID</th>
        <th class="th_edit">TÊN DANH MỤC DỊCH VỤ</th>
        <th class="th_edit">QUẢN LÝ</th>
    </tr>

    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_danhmucdichvu)) {
        $i++;
    
    ?>

    <tr style="text-align: center;">
        <td><?php echo $i ?></td>
        <td><?php echo $row['tendanhmucdichvu'] ?></td>
        <td>
            <a class="btn btn-danger" href="modules/quanlydanhmucdichvu/xuly.php?iddanhmucdichvu=<?php echo $row['id_danhmucdichvu'] ?>"> XÓA</a> | 
            <a class="btn btn-info"href="?action=quanlydanhmucdichvu&query=sua&iddanhmucdichvu=<?php echo $row['id_danhmucdichvu'] ?>">SỬA</a>
        </td>
    </tr>
    <?php
    }
    ?>
</table>