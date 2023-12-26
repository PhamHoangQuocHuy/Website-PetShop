<?php
$sql_lietke_danhmuctintuc = "SELECT *FROM tbl_danhmuctintuc ORDER BY thutu ASC";
$query_lietke_danhmuctintuc = mysqli_query($mysqli, $sql_lietke_danhmuctintuc);
?>
<br><br>
<p style="font-size: 30px;text-align: center;"><strong>LIỆT KÊ DANH MỤC TIN TỨC</strong></p>
<table style="width: 100%" border="1" style="border-collapse: collapse;">

    <tr style="text-align: center;">
        <th class="th_edit">ID DANH MỤC TIN TỨC</th>
        <th class="th_edit">TÊN DANH MỤC TIN TỨC</th>
        <th class="th_edit">QUẢN LÝ</th>
    </tr>

    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_danhmuctintuc)) {
        $i++;
    
    ?>

    <tr style="text-align: center;">
        <td><?php echo $i ?></td>
        <td><?php echo $row['tendanhmuctintuc'] ?></td>
        <td>
            <a class="btn btn-danger" href="modules/quanlydanhmuctintuc/xuly.php?iddanhmuctintuc=<?php echo $row['id_danhmuctintuc'] ?>"> XÓA</a> | 
            <a class="btn btn-info"href="?action=quanlydanhmuctintuc&query=sua&iddanhmuctintuc=<?php echo $row['id_danhmuctintuc'] ?>">SỬA</a>
        </td>
    </tr>
    <?php
    }
    ?>
</table>