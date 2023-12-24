<br><br>
<p style="text-align: center;font-size: 30px;"><strong>THÊM TIN TỨC</strong></p>
<table border="1" width="100%" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlytintuc/xuly.php" enctype="multipart/form-data">
        <tr>
            <td>TÊN TIN TỨC</td>
            <td><input type="text" name="tentintuc"></td>
        </tr>
        <tr>
            <td>MÃ TIN TỨC</td>
            <td><input type="text" name="matintuc"></td>
        </tr>
        <tr>
            <td>HÌNH ẢNH</td>
            <td><input type="file" name="hinhanh"></td>
        </tr>
        <tr>
            <td>TÓM TẮT</td>
            <td><textarea rows="10"  name="tomtat" style="resize: none"></textarea></td>
        </tr>
        <tr>
            <td>NỘI DUNG</td>
            <td><textarea rows="10" name="noidung" style="resize: none"></textarea></td>
        </tr>
        <tr>
            <td>TÌNH TRẠNG</td>
            <td>
                <select name="tinhtrang">
                    <option value="1">Kích hoạt</option>
                    <option value="0">Ẩn</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>DANH MỤC TIN TỨC</td>
            <td>
                <select name="danhmuctintuc">
                    <?php
                    $sql_danhmuctintuc = "SELECT * FROM tbl_danhmuctintuc ORDER BY id_danhmuctintuc DESC";
                    $query_danhmuctintuc = mysqli_query($mysqli, $sql_danhmuctintuc) or die( mysqli_error($mysqli));
                    while ($row_danhmuctintuc = mysqli_fetch_array($query_danhmuctintuc)) {
                    ?>
                        <option value="<?php echo $row_danhmuctintuc['id_danhmuctintuc'] ?>"><?php echo $row_danhmuctintuc['tendanhmuctintuc'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input class="btn btn-success" type="submit" name="themtintuc" value="THÊM TIN TỨC"></td>
        </tr>
    </form>
</table>