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
        }elseif($tam=='thucung'){
            include("main/thucung.php");
        }elseif($tam=='sanpham'){
            include("main/sanpham.php");
        }elseif($tam=='dichvu'){
            include("main/dichvu.php");
        }elseif($tam=='tintuc'){
            include("main/tintuc.php");
        }elseif($tam=='lienhe'){
            include("main/lienhe.php");
        }else{
            include("main/index.php");
        }
        ?>
    </div>
</div>