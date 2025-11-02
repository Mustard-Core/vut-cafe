<?php
session_start();

if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['price'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $price = $_POST['price'];

    // If item already in cart, increase quantity
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += 1;
    } else {
        $_SESSION['cart'][$id] = [
            'title' => $title,
            'price' => $price,
            'quantity' => 1
        ];
    }
}
header('Location: cart.php');
exit;
?>
