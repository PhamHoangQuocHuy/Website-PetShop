<div class="clear"></div>
<div class="main">
    <?php
    if (isset($_GET['action']) && $_GET['query']) {
        $tam = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $tam = '';
        $query = '';
    }
    //quan ly danh muc sp
    if ($tam == 'quanlydanhmucsanpham' && $query == 'them') {
        include("modules/quanlydanhmucsanpham/them.php");
        include("modules/quanlydanhmucsanpham/lietke.php");
    } elseif ($tam == 'quanlydanhmucsanpham' && $query == 'sua') {
        include("modules/quanlydanhmucsanpham/sua.php");
    } elseif ($tam == 'quanlysp' && $query == 'them') {
        // quan ly sp
        include("modules/quanlysp/them.php");
        include("modules/quanlysp/lietke.php");
    } elseif ($tam == 'quanlysp' && $query == 'sua') {
        include("modules/quanlysp/sua.php");
    } elseif ($tam == 'quanlydonhang' && $query == 'lietke') {
        include("modules/quanlydonhang/lietke.php");
    } elseif ($tam == 'donhang' && $query == 'xemdonhang') {
        include("modules/quanlydonhang/xemdonhang.php");
    } elseif ($tam == 'quanlytaikhoan' && $query == 'lietke') {
        include("modules/quanlytaikhoan/lietke.php");
    } elseif ($tam == 'taikhoan' && $query == 'xemtaikhoan') {
        include("modules/quanlytaikhoan/xemtaikhoan.php");
    } else {
        include("modules/dashboard.php");
    }
    ?>
</div>