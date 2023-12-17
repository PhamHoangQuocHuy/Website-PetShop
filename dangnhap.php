<?php
session_start();
include('admincp/config/config.php');
if (isset($_POST['dangnhap'])) {
    $taikhoan = $_POST['username'];
    $matkhau = md5($_POST['password']);
    $sql_admin = "SELECT *FROM tbl_user WHERE username='" . $taikhoan . "' AND password='" . $matkhau . "' AND role=1 LIMIT 1";
    $sql_user = "SELECT *FROM tbl_user WHERE username='" . $taikhoan . "' AND password='" . $matkhau . "' AND role=0 LIMIT 1";
    $row_admin = mysqli_query($mysqli, $sql_admin);
    $row_user = mysqli_query($mysqli, $row_user);
    $count_admin = mysqli_num_rows($row_admin);
    $count_user = mysqli_num_rows($row_user);
    if ($count_admin > 0) {
        $_SESSION['dangnhap'] = $taikhoan;
        header("Location: admincp/index.php");
    } else {
        $_SESSION['dangnhap'] = $taikhoan;
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>ĐĂNG NHẬP - ADMIN</title>
    <style type="text/css">
        body{
            margin-top: 50px;
            background: #f2f2f2;
        }
        .wrapper-login{
            width: 20%;
            margin:  0 auto;
        }
        table.table-login{
            width: 100%;
            margin-top: 10px;
        }
        table.table-login tr td{
            padding: 5px;
            padding-top: 10px;
        }
    </style>
</head>

<body>
    <div class="wrapper-login">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" autocomplete="off" method="post">
        <table border="1" class="table-login" style="text-align: center; border-collapse: collapse; background-color: #cdc5bf;">
            <tr>
                <td colspan="2"><h2><i class="bi bi-person-circle text-info"></i>  ĐĂNG NHẬP</h2></td>
            </tr>
            <tr>
                <td>Tài khoản</td>
                <td><input type="text" name="username" placeholder="Nhập mật khẩu"></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="password" name="password" placeholder="Mật khẩu"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập" class="btn btn-success"> </td>
            </tr>
        </table>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>