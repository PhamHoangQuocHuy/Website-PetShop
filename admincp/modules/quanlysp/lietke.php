<?php
$sql_lietke_sp = "SELECT *FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY id_sanpham ASC";
$query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
?>
<p>Liệt kê sản phẩm</p>

<table style="width: 100%" border="1" style="border-collapse: collapse;">

    <tr style="text-align: center;">
        <th>ID</th>
        <th>TÊN SẢN PHẨM</th>
        <th>HÌNH ẢNH</th>
        <th>GIÁ</th>
        <th>SỐ LƯỢNG</th>
        <th>DANH MỤC</th>
        <th>MÃ SP</th>
        <th>TÓM TẮT</th>
        <th>TRẠNG THÁI</th>
        <th>QUẢN LÝ</th>
    </tr>

    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_sp)) {
        $i++;
    ?>
        <tr style="text-align: center;">
            <td><?php echo $i ?></td>
            <td><?php echo $row['tensanpham'] ?></td>
            <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px" height="150px"> </td>
            <td><?php echo $row['gia'] ?></td>
            <td><?php echo $row['soluong'] ?></td>
            <td><?php echo $row['tendanhmuc'] ?></td>
            <td><?php echo $row['masanpham'] ?></td>
            <td><?php echo $row['tomtat'] ?></td>
            <td><?php if ($row['tinhtrang'] == 1) {
                    echo 'KÍCH HOẠT';
                } else {
                    echo 'ẨN';
                }

                ?>

            </td>

            <td>
                <a class="btn btn-danger" href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>">XÓA</a> |
                <a class="btn btn-info" href="?action=quanlysp&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>">SỬA</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>