<?php
session_start();
?>
<h3 class="title">GIỎ HÀNG</h3>
<?php
if (isset($_SESSION['cart'])) {
}
?>
<table style="width: 100%; text-align: center; border-collapse: collapse;" border="1">
    <tr>
        <th>Id</th>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số lượng</th>
        <th>Giá sản phẩm</th>
        <th>Thành tiền</th>
        <th>Quản lý</th>
    </tr>
    <?php
    if (isset($_SESSION['cart'])) {
        $i = 0;
        $tongtien = 0;
        foreach ($_SESSION['cart'] as $cart_item) {
            $thanhtien = $cart_item['soluong'] * $cart_item['gia'];
            $tongtien += $thanhtien;
            $i++;
    ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $cart_item['masanpham']; ?></td>
                <td><?php echo $cart_item['tensanpham']; ?></td>
                <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="150px"></td>
                <td>
                    <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="bi bi-plus-circle-fill"></i></a>
                    <?php echo $cart_item['soluong']; ?>
                    <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="bi bi-dash-circle-fill"></i></a>
                </td>
                <td><?php echo number_format($cart_item['gia'], 0, ',', '.') . 'vnđ'; ?></td>
                <td><?php echo number_format($thanhtien, 0, ',', '.') . 'vnđ'; ?></td>
                <td><a class="btn btn-success" href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>">Xóa</a></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="8">
                <p style="float: left; color: red; font-size: 20px;">Tổng tiền: <?php echo number_format($tongtien, 0, ',', '.') . 'vnđ'; ?></p>
                <p class="btn btn-danger" style="float: right;"><a href="pages/main/themgiohang.php?xoatatca=1"> Xóa tất cả</a></p>
            </td>
        </tr>

    <?php
    } else {
    ?>
        <tr>
            <td colspan="8">
                <p><i class="bi bi-exclamation-triangle-fill text-warning"></i> HIỆN TẠI GIỎ HÀNG TRỐNG</p>
            </td>
        </tr>
    <?php
    }
    ?>
</table>