<?php
$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc) or die(mysqli_error($mysqli));
?>
<?php
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['dangnhap']);
}
?>
<div class="menu">
    <ul class="list_menu">
        <li><a href="index.php">Trang chủ</a></li>
        <li><a href="index.php?quanly=gioithieu">Giới thiệu</a></li>
        <li><a href="index.php?quanly=giohang">Giỏ hàng</a></li>

        <?php
        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
        ?>
            <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
        <?php
        }
        ?>
        
        <li><a href="index.php?quanly=dichvu">Dịch vụ</a></li>
        <li><a href="index.php?quanly=tintuc">Tin tức</a></li>
        <?php
        if (isset($_SESSION['dangnhap'])) {
        ?>
            <li><a href="index.php?dangxuat=1">Đăng xuất</a></li>
            <li><a href="index.php?quanly=thaydoimatkhau">Thay đổi mật khẩu</a></li>
        <?php
        } else {
        ?>
            <li><a href="index.php?quanly=dangky">Đăng ký</a></li>
        <?php
        }
        ?>
    </ul>
    <p>
    <form action="index.php?quanly=timkiem" method="POST" style="float: right;">
        <input type="text" placeholder="Tìm kiếm" name="tukhoa" style="border-radius: 30px;background-color:#B0E0E6;" >
        <input type="submit" name="timkiem" value="Tìm kiếm" style="border-radius: 30px;">
    </form>
    </p>
</div>