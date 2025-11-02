<?php
session_start();
$cart = $_SESSION['cart'] ?? [];
?>

<h2>Your Cart</h2>
<?php if (empty($cart)): ?>
    <p>Cart is empty</p>
<?php else: ?>
    <table border="1" cellpadding="10">
        <tr>
            <th>Item</th>
            <th>Price (R)</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        <?php 
        $grandTotal = 0;
        foreach ($cart as $id => $item): 
            $total = $item['price'] * $item['quantity'];
            $grandTotal += $total;
        ?>
        <tr>
            <td><?= $item['title'] ?></td>
            <td><?= $item['price'] ?></td>
            <td><?= $item['quantity'] ?></td>
            <td><?= $total ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h3>Grand Total: R<?= $grandTotal ?></h3>

    <form action="clear_cart.php" method="post">
        <button type="submit">Clear Cart</button>
    </form>
<?php endif; ?>
