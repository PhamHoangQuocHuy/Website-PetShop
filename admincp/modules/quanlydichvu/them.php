<br><br>
<p style="text-align: center;font-size: 30px;"><strong>THÊM DỊCH VỤ</strong></p>
<table border="1" width="100%" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlydichvu/xuly.php" enctype="multipart/form-data">
        <tr>
            <td>TÊN DỊCH VỤ</td>
            <td><input type="text" name="tendichvu"></td>
        </tr>
        <tr>
            <td>MÃ DỊCH VỤ</td>
            <td><input type="text" name="madichvu"></td>
        </tr>
        <tr>
            <td>GIÁ DỊCH VỤ</td>
            <td><input type="text" name="giadichvu"></td>
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
            <td>DANH MỤC DỊCH VỤ</td>
            <td>
                <select name="danhmucdichvu">
                    <?php
                    $sql_danhmucdichvu = "SELECT * FROM tbl_danhmucdichvu ORDER BY id_danhmucdichvu DESC";
                    $query_danhmucdichvu = mysqli_query($mysqli, $sql_danhmucdichvu) or die( mysqli_error($mysqli));
                    while ($row_danhmucdichvu = mysqli_fetch_array($query_danhmucdichvu)) {
                    ?>
                        <option value="<?php echo $row_danhmucdichvu['id_danhmucdichvu'] ?>"><?php echo $row_danhmucdichvu['tendanhmucdichvu'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input class="btn btn-success" type="submit" name="themdichvu" value="THÊM DỊCH VỤ"></td>
        </tr>
    </form>
</table>