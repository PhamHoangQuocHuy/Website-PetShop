<?php
$sql_lietke_sp = "SELECT *FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY id_sanpham ASC";
$query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);

// Loc theo danh muc sp
$sql_lietke_loaixe = "SELECT * FROM tbl_danhmuc";
$query_lietke_loaixe = mysqli_query($mysqli, $sql_lietke_loaixe);



$sql_lietke_xe = "SELECT * FROM tbl_sanpham JOIN tbl_danhmuc ON tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc";

if (isset($_POST['filter'])) {
    $selected_id_cate = $_POST['id_danhmuc'];
    if (!empty($selected_id_cate)) {
        $sql_lietke_xe .= " WHERE tbl_danhmuc.id_danhmuc = $selected_id_cate";
    }
}

$query_lietke_xe = mysqli_query($mysqli, $sql_lietke_xe); ?>
<br><br><br>
<!-- form loc sp -->
<form action="" method="post">
    <label for="id_danhmuc">Chọn danh mục:</label>
    <select name="id_danhmuc" id="id_danhmuc">
        <option value="">Tất cả</option>
        <?php while ($row_loaixe = mysqli_fetch_assoc($query_lietke_loaixe)) { ?>
            <option value="<?php echo $row_loaixe['id_danhmuc']; ?>"><?php echo $row_loaixe['tendanhmuc']; ?></option>
        <?php } ?>
    </select>
    <input type="submit" name="filter" value="Lọc">
</form>

<p style="text-align: center;font-size: 30px;"><strong> Liệt kê sản phẩm</strong></p>

<table style="width: 100%" border="1" style="border-collapse: collapse;">

    <tr style="text-align: center;">
        <th class="th_edit">ID</th>
        <th class="th_edit">TÊN SẢN PHẨM</th>
        <th class="th_edit">HÌNH ẢNH</th>
        <th class="th_edit">GIÁ</th>
        <th class="th_edit">SỐ LƯỢNG</th>
        <th class="th_edit">DANH MỤC</th>
        <th class="th_edit">MÃ SP</th>
        <th class="th_edit">TÓM TẮT</th>
        <th class="th_edit">TRẠNG THÁI</th>
        <th class="th_edit">QUẢN LÝ</th>
    </tr>

    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_xe)) {
        $i++;
    ?>
        <tr style="text-align: center;">
            <td><?php echo $i ?></td>
            <td><?php echo $row['tensanpham'] ?></td>
            <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px" height="150px"> </td>
            <td><?php echo number_format($row['gia'], 0, ',', '.') . 'vnđ' ?></td>
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