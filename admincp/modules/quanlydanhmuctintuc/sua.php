<?php
$sql_sua_danhmuctintuc = "SELECT * FROM tbl_danhmuctintuc WHERE id_danhmuctintuc = '$_GET[iddanhmuctintuc]' LIMIT 1";
$query_sua_danhmuctintuc = mysqli_query($mysqli, $sql_sua_danhmuctintuc);
?>
<br><br>
<p style="font-size: 20px;"><strong>SỬA DANH MỤC TIN TỨC</strong></p>
<table border="1" width="50%" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlydanhmuctintuc/xuly.php?iddanhmuctintuc=<?php echo $_GET['iddanhmuctintuc'] ?>">
        <?php
        while ($dong = mysqli_fetch_array($query_sua_danhmuctintuc)) {

        ?>
            <tr>
                <td>TÊN DANH MỤC TIN TỨC</td>
                <td><input type="text" value="<?php echo $dong['tendanhmuctintuc'] ?>" name="tendanhmuctintuc"></td>
            </tr>
            <tr>
                <td>THỨ TỰ</td>
                <td><input type="text" value="<?php echo $dong['thutu'] ?>" name="thutu"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" class="btn btn-info" name="suadanhmuctintuc" value="SỬA DANH MỤC TIN TỨC"></td>
            </tr>

        <?php
        }
        ?>
    </form>
</table>