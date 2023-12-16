<?php
session_start();
include('../../admincp/config/config.php');
// them so luong
if (isset($_GET['cong'])) {
    $id = $_GET['cong'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array(
                'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'],
                'gia' => $cart_item['gia'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item['masanpham']
            );
            $_SESSION['cart'] = $product;
        } else {
            $tangsoluong = $cart_item['soluong'] + 1;
            if ($cart_item['soluong'] <= 9) {
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $tangsoluong,
                    'gia' => $cart_item['gia'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item['masanpham']
                );
            } else {
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'],
                    'gia' => $cart_item['gia'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item['masanpham']
                );
            }
            $_SESSION['cart'] = $product;
        }
    }
    header('Location:../../index.php?quanly=giohang');
}
// tru so luong
if (isset($_GET['tru'])) {
    $id = $_GET['tru'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array(
                'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'],
                'gia' => $cart_item['gia'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item['masanpham']
            );
            $_SESSION['cart'] = $product;
        } else {
            $tangsoluong = $cart_item['soluong'] - 1;
            if ($cart_item['soluong'] > 1) {
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $tangsoluong,
                    'gia' => $cart_item['gia'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item['masanpham']
                );
            } else {
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'],
                    'gia' => $cart_item['gia'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item['masanpham']
                );
            }
            $_SESSION['cart'] = $product;
        }
    }
    header('Location:../../index.php?quanly=giohang');
}

// xoa san pham
if (isset($_SESSION['cart']) && isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array(
                'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'],
                'gia' => $cart_item['gia'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item['masanpham']
            );
        }
        $_SESSION['cart'] = $product;
        header('Location:../../index.php?quanly=giohang');
    }
}
//xoa tat ca
if (isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1) {
    unset($_SESSION['cart']);
    header('Location:../../index.php?quanly=giohang');
}
// them sp vao gio hang
if (isset($_POST['themgiohang'])) {
    // session_destroy();
    $id = $_GET['idsanpham'];
    $soluong = 1;
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '" . $id . "' LIMIT 1 ";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);
    if ($row) {
        $new_product = array(array(
            'tensanpham' => $row['tensanpham'], 'id' => $id, 'soluong' => $soluong,
            'gia' => $row['gia'], 'hinhanh' => $row['hinhanh'], 'masanpham' => $row['masanpham']
        ));
        //kiem tra session gio hang ton tai
        if (isset($_SESSION['cart'])) {
            $found = false;
            foreach ($_SESSION['cart'] as $cart_item) {
                //neu du lieu trung
                if ($cart_item['id'] == $id) {
                    $product[] = array(
                        'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $soluong + 1,
                        'gia' => $cart_item['gia'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item['masanpham']
                    );
                    $found = true;
                } else {
                    //neu du lieu k trung
                    $product[] = array(
                        'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'],
                        'gia' => $cart_item['gia'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item['masanpham']
                    );
                }
            }
            if ($found == false) {
                // lien ket du lieu product voi new_product
                $_SESSION['cart'] = array_merge($product, $new_product);
            } else {
                $_SESSION['cart'] = $product;
            }
        } else {
            $_SESSION['cart'] = $new_product;
        }
    }
    header('Location:../../index.php?quanly=giohang');
}
