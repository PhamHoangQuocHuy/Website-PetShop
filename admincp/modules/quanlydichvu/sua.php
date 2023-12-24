<?php
$sql_sua_dichvu = "SELECT * FROM tbl_dichvu WHERE id_dichvu = '$_GET[iddichvu]' LIMIT 1";
$query_sua_dichvu = mysqli_query($mysqli, $sql_sua_dichvu);
?>
<br><br>
<p style="text-align: center;font-size: 30px;"><strong>SỬA DỊCH VỤ</strong></p>
<table border="1" width="100%" style="border-collapse: collapse;">
    <?php
    while ($dong = mysqli_fetch_array($query_sua_dichvu)) {

    ?>
        <form method="POST" action="modules/quanlydichvu/xuly.php?iddichvu=<?php echo $dong['id_dichvu'] ?>"enctype="multipart/form-data">
            <tr>
                <td>MÃ DỊCH VỤ</td>
                <td><input type="text" value="<?php echo $dong['madichvu'] ?>" name="madichvu"></td>
            </tr>
            <tr>
                <td>TÊN DỊCH VỤ</td>
                <td><input type="text" value="<?php echo $dong['tendichvu'] ?>" name="tendichvu"></td>
            </tr>
            <tr>
                <td>GIÁ DỊCH VỤ</td>
                <td><input type="text" value="<?php echo $dong['giadichvu'] ?>" name="giadichvu"></td>
            </tr>
            <tr>
                <td>HÌNH ẢNH</td>
                <td>
                    <input type="file" name="hinhanh">
                    <img src="modules/quanlydichvu/uploads/<?php echo $dong['hinhanh'] ?>" width="150px">
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
                <td>DANH MỤC DỊCH VỤ</td>
                <td>
                    <select name="danhmucdichvu">
                        <?php
                        $sql_danhmucdichvu = "SELECT * FROM tbl_danhmucdichvu ORDER BY id_danhmucdichvu DESC";
                        $query_danhmucdichvu = mysqli_query($mysqli, $sql_danhmucdichvu) or die(mysqli_error($mysqli));
                        while ($row_danhmucdichvu = mysqli_fetch_array($query_danhmucdichvu)) {
                            if ($row_danhmucdichvu['id_danhmucdichvu'] == $row_danhmuc['id_danhmucdichvu']) {
                        ?>
                                <option selected value="<?php echo $row_danhmucdichvu['id_danhmucdichvu'] ?>"><?php echo $row_danhmucdichvu['tendanhmucdichvu'] ?></option>
                            <?php
                            } else {
                            ?>
                                <option selected value="<?php echo $row_danhmucdichvu['id_danhmucdichvu'] ?>"><?php echo $row_danhmucdichvu['tendanhmucdichvu'] ?></option>
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
                <td colspan="2"><input class="btn btn-info" type="submit" name="suadichvu" value="SỬA DỊCH VỤ"></td>
            </tr>
        </form>
    <?php
    }
    ?>
</table>