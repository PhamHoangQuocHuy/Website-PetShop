<?php
    include('../../config/config.php');
    if(isset($_GET['code'])){
        $code_cart = $_GET['code'];
        $sql = mysqli_query($mysqli,"UPDATE tbl_cart SET cart_status= 0 WHERE code_cart='".$code_cart."' ");
        header('Location: ../../index.php?action=quanlydonhang&query=lietke');
    }
?>