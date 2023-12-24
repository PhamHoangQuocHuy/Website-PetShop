<?php
$sql_lietke_danhmucsp = "SELECT *FROM tbl_danhmuc ORDER BY thutu ASC";
$query_lietke_danhmucsp = mysqli_query($mysqli, $sql_lietke_danhmucsp);
?>
<br><br><br>
<p style="text-align: center;font-size: 30px;"><strong> Liệt kê danh mục sản phẩm</strong></p>
<table style="width: 100%" border="1" style="border-collapse: collapse;">

    <tr style="text-align: center;">
        <th class="th_edit">ID</th>
        <th class="th_edit">TÊN DANH MỤC</th>
        <th class="th_edit">QUẢN LÝ</th>
    </tr>

    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
        $i++;
    
    ?>

    <tr style="text-align: center;">
        <td><?php echo $i ?></td>
        <td><?php echo $row['tendanhmuc'] ?></td>
        <td>
            <a class="btn btn-danger" href="modules/quanlydanhmucsanpham/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>"> XÓA</a> | 
            <a class="btn btn-info"href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>">SỬA</a>
        </td>
    </tr>
    <?php
    }
    ?>
</table>