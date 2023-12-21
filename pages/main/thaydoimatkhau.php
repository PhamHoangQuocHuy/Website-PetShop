<?php
if (isset($_POST['doimatkhau'])) {
    $taikhoan = $_POST['username'];
    $matkhau_cu = md5($_POST['password_cu']);
    $matkhau_moi = md5($_POST['password_moi']);
    $sql = "SELECT *FROM tbl_user WHERE username='" . $taikhoan . "' AND password='" . $matkhau_cu . "' LIMIT 1";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
        $row_data = mysqli_fetch_array($row);
        if ($row_data['role'] == 0) {
            $sql_update = mysqli_query($mysqli, "UPDATE tbl_user SET password='" . $matkhau_moi . "' WHERE username='" . $taikhoan . "' ");
            echo '<strong><p style="color: green">Mật khẩu đã được cập nhật</p></strong>';
        } else {
            echo '<strong><p style="color: red">Tài khoản hoặc mật khẩu không đúng. Vui lòng nhập lại </p></strong>';
        }
    }
}
?>

<form action="" autocomplete="on" method="post">
    <table border="1" class="table-login" style="text-align: center; border-collapse: collapse;">
        <tr>
            <td colspan="2">
                <h2><i class="bi bi-person-gear"></i> ĐỔI MẬT KHẨU</h2>
            </td>
        </tr>
        <tr>
            <td>Tài khoản</td>
            <td><input type="text" name="username" placeholder="Nhập tài khoản"></td>
        </tr>
        <tr>
            <td>Mật khẩu cũ</td>
            <td><input type="password" name="password_cu" placeholder="Mật khẩu cũ"></td>
        </tr>
        <tr>
            <td>Mật khẩu mới</td>
            <td><input type="password" name="password_moi" placeholder="Mật khẩu mới"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="doimatkhau" value="Đổi mật khẩu" class="btn btn-success"> </td>
        </tr>
    </table>
</form>
</div>