<?php
$sql_sua_danhmucsp = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc = '$_GET[iddanhmuc]' LIMIT 1";
$query_sua_danhmucsp = mysqli_query($mysqli, $sql_sua_danhmucsp);
?>
<br><br>
<p style="font-size: 30px;"><strong>SỬA DANH MỤC SẢN PHẨM</strong></p>
<table border="1" width="50%" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlydanhmucsanpham/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>">
        <?php
        while ($dong = mysqli_fetch_array($query_sua_danhmucsp)) {

        ?>
            <tr>
                <td>TÊN DANH MỤC</td>
                <td><input type="text" value="<?php echo $dong['tendanhmuc'] ?>" name="tendanhmuc"></td>
            </tr>
            <tr>
                <td>THỨ TỰ</td>
                <td><input type="text" value="<?php echo $dong['thutu'] ?>" name="thutu"></td>
            </tr>
            <tr>
                <td colspan="2"><input class="btn btn-info" type="submit" name="suadanhmuc" value="SỬA DANH MỤC SẢN PHẨM"></td>
            </tr>

        <?php
        }
        ?>
    </form>
</table>