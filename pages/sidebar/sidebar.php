<div class="sidebar">
    <ul class="list_sidebar">
        <!-- danh muc san pham -->
        <div style="text-align: center; color: #323E74;"><strong> DANH MỤC SẢN PHẨM</strong></div>
        <?php
        $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc) or die(mysqli_error($mysqli));
        while ($row = mysqli_fetch_array($query_danhmuc)) {
        ?>
            <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc'] ?>"><?php echo $row['tendanhmuc'] ?></a></li>

        <?php
        }
        ?>

        <!-- danh muc dich vu -->
        <div style="text-align: center; color: #323E74;"><strong> DANH MỤC DỊCH VỤ</strong></div>
        <?php
        $sql_dichvu = "SELECT * FROM tbl_dichvu ORDER BY id_dichvu DESC";
        $query_dichvu = mysqli_query($mysqli, $sql_dichvu) or die(mysqli_error($mysqli));
        while ($row = mysqli_fetch_array($query_dichvu)) {
        ?>
            <li><a href="index.php?quanly=dichvu&id=<?php echo $row['id_dichvu'] ?>"><?php echo $row['tendichvu'] ?></a></li>

        <?php
        }
        ?>

    </ul>
</div>