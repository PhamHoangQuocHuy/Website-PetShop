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



        //quan ly danh muc dich vu
    } elseif ($tam == 'quanlydanhmucdichvu' && $query == 'them') {
        include("modules/quanlydanhmucdichvu/them.php");
        include("modules/quanlydanhmucdichvu/lietke.php");
    } elseif ($tam == 'quanlydanhmucdichvu' && $query == 'sua') {
        include("modules/quanlydanhmucdichvu/sua.php");
        // quan ly dich vu
    } elseif ($tam == 'quanlydichvu' && $query == 'them') {
        include("modules/quanlydichvu/them.php");
        include("modules/quanlydichvu/lietke.php");
    } elseif ($tam == 'quanlydichvu' && $query == 'sua') {
        include("modules/quanlydichvu/sua.php");

        // quan ly danh muc tin tuc
    } elseif ($tam == 'quanlydanhmuctintuc' && $query == 'them') {
        include("modules/quanlydanhmuctintuc/them.php");
        include("modules/quanlydanhmuctintuc/lietke.php");
    } elseif ($tam == 'quanlydanhmuctintuc' && $query == 'sua') {
        include("modules/quanlydanhmuctintuc/sua.php");
        //quan ly tin tuc
    } elseif ($tam == 'quanlytintuc' && $query == 'them') {
        include("modules/quanlytintuc/them.php");
        include("modules/quanlytintuc/lietke.php");
    } elseif ($tam == 'quanlytintuc' && $query == 'sua') {
        include("modules/quanlytintuc/sua.php");


        // quan ly don hang
    } elseif ($tam == 'quanlydonhang' && $query == 'lietke') {
        include("modules/quanlydonhang/lietke.php");
    } elseif ($tam == 'donhang' && $query == 'xemdonhang') {
        include("modules/quanlydonhang/xemdonhang.php");


        // quan ly tai khoan
    } elseif ($tam == 'quanlytaikhoan' && $query == 'lietke') {
        include("modules/quanlytaikhoan/lietke.php");
    } elseif ($tam == 'taikhoan' && $query == 'xemtaikhoan') {
        include("modules/quanlytaikhoan/xemtaikhoan.php");

        // quan ly lich hen
    } elseif ($tam == 'quanlylichhen' && $query == 'lietke') {
        include("modules/quanlylichhen/lietke.php");
    } elseif ($tam == 'lichhen' && $query == 'xemlichhen') {
        include("modules/quanlylichhen/xemlichhen.php");

    } else {
        include("modules/dashboard.php");
    }
    ?>
</div>