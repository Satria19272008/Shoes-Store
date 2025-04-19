<?php
session_start();

if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    header("Location: cart.php");
    exit;
}

$total = 0;
foreach ($_SESSION['cart'] as $product) {
    $total += $product['price'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Toko Sepatu</title>
    <link rel="stylesheet" href="checkout.css">
</head>

<body>
    <header>
        <h1>Checkout</h1>
    </header>

    <main>
        <h2>Billing Information</h2>
        <form action="process_checkout.php" method="POST">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>

            <label for="address">Shipping Address</label>
            <input type="text" id="address" name="address" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="payment">Payment Method</label>
            <select id="payment" name="payment">
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
            </select>

            <h3>Total: $<?php echo $total; ?></h3>

            <button type="submit">Complete Purchase</button>
        </form>
    </main>

    <footer>
        <p>© 2024 Toko Sepatu. All Rights Reserved.</p>
    </footer>
</body>

</html>