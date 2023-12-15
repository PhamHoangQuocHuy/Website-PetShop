<?php
$sql_sua_sp = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
$query_sua_sp = mysqli_query($mysqli, $sql_sua_sp);
?>

<p>SỬA SẢN PHẨM</p>
<table border="1" width="100%" style="border-collapse: collapse;">
    <?php
    while ($row = mysqli_fetch_array($query_sua_sp)) {
    ?>
        <form clas method="POST" action="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>" enctype="multipart/form-data">
            <tr>
                <td>MÃ SẢN PHẨM</td>
                <td><input type="text" value="<?php echo $row['masanpham'] ?>" name="masanpham"></td>
            </tr>
            <tr>
                <td>TÊN SẢN PHẨM</td>
                <td><input type="text" value="<?php echo $row['tensanpham'] ?>" name="tensanpham"></td>
            </tr>
            <tr>
                <td>GIÁ</td>
                <td><input type="text" value="<?php echo $row['gia'] ?>" name="gia"></td>
            </tr>
            <tr>
                <td>SỐ LƯỢNG</td>
                <td><input type="text" value="<?php echo $row['soluong'] ?>" name="soluong"></td>
            </tr>
            <tr>
                <td>HÌNH ẢNH</td>
                <td>
                    <input type="file" name="hinhanh">
                    <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px">
                </td>
            </tr>
            <tr>
                <td>TÓM TẮT</td>
                <td><textarea rows="10" name="tomtat" style="resize: none;"><?php echo $row['tomtat'] ?></textarea></td>
            </tr>
            <tr>
                <td>NỘI DUNG</td>
                <td><textarea rows="10" name="noidung" style="resize: none;"><?php echo $row['noidung'] ?></textarea></td>
            </tr>

            <tr>
                <td>DANH MỤC SẢN PHẨM</td>
                <td>
                    <select name="danhmuc">
                        <?php
                        $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc) or die(mysqli_error($mysqli));
                        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                            if ($row_danhmuc['id_danhmuc'] == $row_danhmuc['id_danhmuc']) {
                        ?>
                                <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                            <?php
                            } else {
                            ?>
                                <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>


            <tr>
                <td>TÌNH TRẠNG</td>
                <td>
                    <select name="tinhtrang">
                        <?php
                        if ($row['tinhtrang'] == 1) {
                        ?>
                            <option value="1" selected>KÍCH HOẠT</option>
                            <option value="0">ẨN</option>
                        <?php
                        } else {
                        ?>
                            <option value="1">KÍCH HOẠT</option>
                            <option value="0" selected>ẨN</option>

                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td colspan="2"><input type="submit" name="suasanpham" value="SỬA SẢN PHẨM"></td>
            </tr>
        </form>
    <?php
    }
    ?>
</table>