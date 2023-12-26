<div id="main">
    <?php
    include("sidebar/sidebar.php");
    ?>
    <div class="maincontent">
        <?php
        if(isset($_GET['quanly'])){
            $tam =$_GET['quanly'];
        }else{
            $tam ='';
        }
        if($tam=='gioithieu'){
            include("main/gioithieu.php");
        }elseif($tam=='giohang'){
            include("main/giohang.php");

            // san pham
        }elseif($tam=='danhmucsanpham'){
            include("main/danhmuc.php");
        }elseif($tam=='sanpham'){
            include("main/sanpham.php");

            // dich vu
        }elseif($tam=='danhmucdichvu'){
            include("main/danhmucdichvu.php");
        }elseif($tam=='dichvu'){
            include("main/dichvu.php");

            // tin tuc
        }elseif($tam=='danhmuctintuc'){
            include("main/danhmuctintuc.php");
        }elseif($tam=='tintuc'){
            include("main/tintuc.php");

            // dang ky
        }elseif($tam=='dangky'){
            include("main/dangky.php");

            //tim kiem
        }elseif($tam=='timkiem'){
            include("main/timkiem.php");

            //thanh toan
        }elseif($tam=='thanhtoan'){
            include("main/thanhtoan.php");

            // trang cam on sau khi thanh toan thanh cong
        }elseif($tam=='camon'){
            include("main/camon.php");
            
            // su dung dich vu
        }elseif($tam=='sudungdichvu'){
            include("main/sudungdichvu.php");

            //thanh toan dich vu
        }elseif($tam=='thanhtoandichvu'){
            include("main/thanhtoandichvu.php");

        }else{
            include("main/index.php");
        }
        ?>
    </div>
</div>