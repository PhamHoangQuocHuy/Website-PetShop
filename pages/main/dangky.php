<?php
if (isset($_POST['dangky'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql_dangky = mysqli_query($mysqli, "INSERT INTO tbl_user (name, username, password, email, diachi, dienthoai) 
        VALUE ('" . $name . "','" . $username . "','" . $password . "','" . $email . "','" . $diachi . "','" . $dienthoai . "' ) ");
    if ($sql_dangky) {
        echo '<p style="color:green">Bạn đã đăng ký thành công <i class="bi bi-check-circle-fill text-success"></i></p>';
        echo '<p><a href="dangnhap.php">Đăng nhập vào tài khoản bạn vừa tạo</a></p>';
    } else {
        echo '<p style="color:red">Đăng kí thất bại. Lỗi:' . mysqli_error($mysqli) . ' </p>';
    }
}
?>
<p>Đăng kí thành viên</p>
<style type="text/css">
    table.dangky tr td {
        padding: 5px;
    }
</style>
<form action="" method="post">
    <table border="1" width="50%" style="border-collapse: collapse;">
        <tr>
            <td>Họ và tên</td>
            <td><input type="text" size="50" name="name"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" size="50" name="email"></td>
        </tr>
        <tr>
            <td>Điện thoại</td>
            <td><input type="text" size="50" name="dienthoai"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" size="50" name="diachi"></td>
        </tr>
        <tr>
            <td>Tên tài khoản</td>
            <td><input type="text" size="50" name="username"></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="password" size="50" name="password"></td>
        </tr>
        <tr>
            <td><input type="submit" name="dangky" class="btn btn-success" value="Đăng ký"></td>
            <td><a href="dangnhap.php">Đăng nhập nếu đã có tài khoản </a></td>
        </tr>
    </table>
</form>