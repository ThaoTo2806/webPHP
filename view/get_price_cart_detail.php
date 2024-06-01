<?php
include('./includeLibrary.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cartId = $_POST['cartId'];
    $productId = $_POST['productId'];
    $colorId = $_POST['colorId'];

    $cartDetail = CartDetail::getCartDetailByProductIdAndColorId($productId, $colorId, $cartId);
    echo $cartDetail->getDonGia() * $cartDetail->getSoLuong();
}
