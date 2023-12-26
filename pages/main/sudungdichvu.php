    <p style="font-weight: 20px;"><strong>SỬ DỤNG DỊCH VỤ</strong></p>
    <form action="../../index.php?quanly=thanhtoandichvu&iddichvu=<?php echo $_GET['iddichvu'] ?>" method="post">
        <table border="1" width="50%" style="border-collapse: collapse;">
            <tr>
                <td>Loại thú cưng</td>
                <td><input type="text" size="50" placeholder="vd: chó, mèo, ..." name="loaithucung"></td>
            </tr>
            <tr>
                <td>Giống</td>
                <td><input type="text" size="50" placeholder="vd: chó poodle, mèo Anh tai cụp,..." name="giongthucung"></td>
            </tr>
            <tr>
                <td>Trọng lượng</td>
                <td><input type="text" size="50" placeholder="vd: 3-4kg" name="trongluong"></td>
            </tr>
            <tr>
                <td>Đặt lịch hẹn</td>
                <td><input type="datetime-local" size="50" name="lichhen"></td>
            </tr>
        </table>
        <tr>
            <button type="submit" class="btn btn-success" name="xacnhan">Xác nhận</button>
        </tr>

    </form>