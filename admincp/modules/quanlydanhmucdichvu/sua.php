<?php
$sql_sua_danhmucdichvu = "SELECT * FROM tbl_danhmucdichvu WHERE id_danhmucdichvu = '$_GET[iddanhmucdichvu]' LIMIT 1";
$query_sua_danhmucdichvu = mysqli_query($mysqli, $sql_sua_danhmucdichvu);
?>
<br><br>
<p style="font-size: 30px;"><strong>SỬA DANH MỤC DỊCH VỤ</strong></p>
<table border="1" width="50%" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlydanhmucdichvu/xuly.php?iddanhmucdichvu=<?php echo $_GET['iddanhmucdichvu'] ?>">
        <?php
        while ($dong = mysqli_fetch_array($query_sua_danhmucdichvu)) {

        ?>
            <tr>
                <td>TÊN DANH MỤC DICH VỤ</td>
                <td><input type="text" value="<?php echo $dong['tendanhmucdichvu'] ?>" name="tendanhmucdichvu"></td>
            </tr>
            <tr>
                <td>THỨ TỰ</td>
                <td><input type="text" value="<?php echo $dong['thutu'] ?>" name="thutu"></td>
            </tr>
            <tr>
                <td colspan="2"><input class="btn btn-info" type="submit" name="suadanhmuc" value="SỬA DANH MỤC DỊCH VỤ"></td>
            </tr>

        <?php
        }
        ?>
    </form>
</table>