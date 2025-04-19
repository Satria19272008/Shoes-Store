<?php
session_start();

// Hapus semua produk dari keranjang
if (isset($_GET['action']) && $_GET['action'] == 'clear') {
    unset($_SESSION['cart']);
}

// Data keranjang
$cart = $_SESSION['cart'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link rel="stylesheet" href="cart.css">
</head>

<body>
    <header>
        <div class="logo">Shoes Store</div>
        <nav>
            <ul>
                <li><a href="toko.php">Home</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="checkout.php">Checkout</li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="cart">
            <h2>Your Cart</h2>
            <?php if (empty($cart)): ?>
            <p></p><a href="toko.php">Your cart is empty. Go back to shop</a></p>
            <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $item): ?>
                    <tr>
                        <td><?= $item['name']; ?></td>
                        <td><?= $item['price']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="checkout.php" class="button checkout">Checkout</a>
            <a href="toko.php" class="button add-item">Add Item</a>
            <a href="cart.php?action=clear" class="button clear-cart">Clear Cart</a>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Toko Sepatu. All Rights Reserved.</p>
    </footer>
</body>

</html>