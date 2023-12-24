<?php
$sql_sua_tintuc = "SELECT * FROM tbl_tintuc WHERE id_tintuc = '$_GET[idtintuc]' LIMIT 1";
$query_sua_tintuc = mysqli_query($mysqli, $sql_sua_tintuc);
?>
<br><br>
<p style="text-align: center;font-size: 30px;"><strong>SỬA TIN TỨC</strong></p>
<table border="1" width="100%" style="border-collapse: collapse;">
    <?php
    while ($dong = mysqli_fetch_array($query_sua_tintuc)) {

    ?>
        <form method="POST" action="modules/quanlytintuc/xuly.php?idtintuc=<?php echo $dong['id_tintuc'] ?>"enctype="multipart/form-data">
            <tr>
                <td>MÃ TIN TỨC</td>
                <td><input type="text" value="<?php echo $dong['matintuc'] ?>" name="matintuc"></td>
            </tr>
            <tr>
                <td>TÊN TIN TỨC</td>
                <td><input type="text" value="<?php echo $dong['tentintuc'] ?>" name="tentintuc"></td>
            </tr>
            <tr>
                <td>HÌNH ẢNH</td>
                <td>
                    <input type="file" name="hinhanh">
                    <img src="modules/quanlytintuc/uploads/<?php echo $dong['hinhanh'] ?>" width="150px">
                </td>
            </tr>
            <tr>
                <td>TÓM TẮT</td>
                <td><textarea rows="10" name="tomtat" style="resize: none;"><?php echo $dong['tomtat'] ?></textarea></td>
            </tr>
            <tr>
                <td>NỘI DUNG</td>
                <td><textarea rows="10" name="noidung" style="resize: none;"><?php echo $dong['noidung'] ?></textarea></td>
            </tr>

            <tr>
                <td>DANH MỤC TIN TỨC</td>
                <td>
                    <select name="danhmuctintuc">
                        <?php
                        $sql_danhmuctintuc = "SELECT * FROM tbl_danhmuctintuc ORDER BY id_danhmuctintuc DESC";
                        $query_danhmuctintuc = mysqli_query($mysqli, $sql_danhmuctintuc) or die(mysqli_error($mysqli));
                        while ($row_danhmuctintuc = mysqli_fetch_array($query_danhmuctintuc)) {
                            if ($row_danhmuctintuc['id_danhmuctintuc'] == $row_danhmuc['id_danhmuctintuc']) {
                        ?>
                                <option selected value="<?php echo $row_danhmuctintuc['id_danhmuctintuc'] ?>"><?php echo $row_danhmuctintuc['tendanhmuctintuc'] ?></option>
                            <?php
                            } else {
                            ?>
                                <option selected value="<?php echo $row_danhmuctintuc['id_danhmuctintuc'] ?>"><?php echo $row_danhmuctintuc['tendanhmuctintuc'] ?></option>
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
                <td colspan="2"><input class="btn btn-info" type="submit" name="suatintuc" value="SỬA TIN TỨC"></td>
            </tr>
        </form>
    <?php
    }
    ?>
</table>