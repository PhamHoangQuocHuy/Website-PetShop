<p>THÊM SẢN PHẨM</p>
<table border="1" width="100%" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlysp/xuly.php">
        <tr>
            <td>MÃ SẢN PHẨM</td>
            <td><input type="text" name="masanpham"></td>
        </tr>
        <tr>
            <td>TÊN SẢN PHẨM</td>
            <td><input type="text" name="tensanpham"></td>
        </tr>
        <tr>
            <td>GIÁ</td>
            <td><input type="text" name="gia"></td>
        </tr>
        <tr>
            <td>SỐ LƯỢNG</td>
            <td><input type="text" name="soluong"></td>
        </tr>
        <tr>
            <td>HÌNH ẢNH</td>
            <td><input type="file" name="hinhanh"></td>
        </tr>
        <tr>
            <td>TÓM TẮT</td>
            <td><textarea rows="10" name="tomtat" style="resize: none;"></textarea></td>
        </tr>
        <tr>
            <td>NỘI DUNG</td>
            <td><textarea rows="10" name="noidung" style="resize: none;"></textarea></td>
        </tr>
        <tr>
            <td>TÌNH TRẠNG</td>
            <td>
                <select name="tinhtrang">
                    <option value="1">KÍCH HOẠT</option>
                    <option value="0">ẨN</option>
                </select>
            </td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" name="themsanpham" value="THÊM SẢN PHẨM"></td>
        </tr>
    </form>
</table>